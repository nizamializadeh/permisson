@component('admin.components.table',$settings)
    {{-- Component content--}}
    @foreach($products->products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->desc}}</td>
            <td>{{$product->price}}</td>
            <td>
                <form action="{{route('product.destroy',['about' => $product->id])}}" method="post">
                    {{ method_field('delete') }}
                    @csrf
                    <a class="btn bg-blue btn-circle waves-effect waves-circle waves-float" href="{{route('product.edit',['product' => $product->id])}}"><i class="material-icons">edit</i></a>
                    <button type="submit" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">delete</i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach

@endcomponent