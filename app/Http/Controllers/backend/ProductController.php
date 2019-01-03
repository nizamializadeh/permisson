<?php

namespace App\Http\Controllers\backend;

use App\Image;
use App\Permission;
use App\Plan;
use App\Product;
use App\Role;
use App\Role_Permission;
use App\User;
use App\User_Role;
use App\UserPlan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $settings = $this->getSettingsForTable();
        $products=User::findorfail(auth()->user()->id);
        return view('backend.product.index',compact('settings','products'));
    }
    public function create()
    {
        $setting = $this->getSettingsForForm();
        return view('backend.product.create',compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $user = User::find(auth()->user()->id);
        foreach($user->roles as $roles)
        {
            $role = Role::find($roles->id);
            foreach ($role->permissions as $rol)
            {
         if ($rol->id==1) {
             $user = User::findorfail(auth()->user()->id);
             $oneMonth = strtotime("-1 month", time());
             $month = date('Y-m-d', $oneMonth);
             $advsCount = Product::where('created_at', '>', $month)->where('user_id', '=', $user->id)->count();
             $test = UserPlan::where('user_id', '=', $user->id)->orderBy('id', 'DESC')->first();
             if ($test != null) {
                 $test2 = Plan::where('id', '=', $test->plan_id)->first();
                 if ($test2 != null) {
                     if (5 + $test2->count <= $advsCount) {
                         return redirect('user/plan');
                     } else {
                         $request->merge(['activity' => 0]);
                         $request->merge(['user_id' => auth()->user()->id]);
                         $product = Product::create($request->all())->id;
                         $files = $request->file('photo');
                         if ($request->hasFile('photo')) {
                             foreach ($files as $file) {
                                 $name = rand() . "." . $file->getClientOriginalExtension();
                                 $file->move(public_path('images/backend'), $name);
                                 $image = new Image();
                                 $image->product_id = $product;
                                 $image->photo = $name;
                                 $image->save();
                                 $request->session()->flash(str_slug('Create product', '-'), 'Product created');
                                 return back();
                             }
                         }
                     }
                 } else {
                     return redirect('user/plan');
                 }
             } else {
                 if (5 <= $advsCount) {
                     return redirect('user/plan');
                 } else {
                     $request->merge(['activity' => 0]);
                     $request->merge(['user_id' => auth()->user()->id]);
                     $product = Product::create($request->all())->id;
                     $files = $request->file('photo');
                     if ($request->hasFile('photo')) {
                         foreach ($files as $file) {
                             $name = rand() . "." . $file->getClientOriginalExtension();
                             $file->move(public_path('images/backend'), $name);
                             $image = new Image();
                             $image->product_id = $product;
                             $image->photo = $name;
                             $image->save();
                             $request->session()->flash(str_slug('Create product', '-'), 'Product created');

                         }
                     }
                     return back();
                 }
             }
         }
         else{
             return redirect('user/plan');

         }
            }
        }
    }
    public function edit(Product $product)
    {
        $setting = $this->getSettingsForForm();
        $setting['title'] = 'Edit category';
        return view('backend.product.edit',compact('product','setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $files = $request->file('photo');
        if ($request->hasFile('photo')){
            foreach ($files as $file) {
                $name = rand(). "." . $file->getClientOriginalExtension();
                $file->move(public_path('images/backend'), $name);
                $image = new Image();
                $image->product_id =$product->id;
                $image->photo = $name;
                $image->save();
            }
        }
        $product->update($request->all());
        $request->session()->flash(str_slug('Edit product','-'),'product edited');
        return back();
    }

    public function destroy(Request $request,Product $product)
    {
        $product->delete();
        $request->session()->flash(str_slug('Products','-'),'product Deleted');
        return back();
    }

    private function getSettingsForTable()
    {
        return  [
            'title' => 'Products',
            'table' => 'product',
            'createButton' => [
                'text' => "Creat product",
                'url' => route('product.create')
            ],
            'columns' => [
                [
                    'label' => 'ID',
                ],
                [
                    'label' => 'Name',
                ],
                [
                    'label' => 'Desc',
                ],
                [
                    'label' => 'Price',
                ]
            ],
        ];
    }

    private  function  getSettingsForForm()
    {
        return [
            'title' => 'Edit product',
            'flashSessionKey' => 'product',
            'flashSessionValue' => 'Product edit',
            'backButton' => [
                'text' => "Back",
                'url' => route('product.index')
            ]
        ];
    }
}
