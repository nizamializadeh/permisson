@component('admin.components.form',$setting)
     {{--Component content--}}
    @foreach($product->images as $image)
        <div class="col-sm-6">
            <div class="form-group form-float">
                    <div class="col-sm-6">
                    <img  style="max-height:250px" class="img-responsive thumbnail post-img-preview" src="{{asset('images/backend/'.$image->photo)}}">
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

                        <form action="{{route('image.destroy',['image' => $image->id])}}" method="post">
                            {{ method_field('delete') }}
                            @csrf
                            <button type="submit" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">delete</i>
                            </button>
                        </form>
                </div>
            </div>
        </div>
    @endforeach
    <form id="form_validation" action="{{route('product.update',['product' => $product->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <div class="row clearfix">

            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="photo[]" type="file"  class="form-control  post-image" id="postImage" multiple>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="name" type="text" required class="form-control" value="{{$product->name}}">
                        <label class="form-label">name</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="desc" type="text" required class="form-control" value="{{$product->desc}}">
                        <label class="form-label">desc</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="price" type="text" required class="form-control" value="{{$product->price}}">
                        <label class="form-label">price</label>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="demo-switch">
                    <div class="switch hide">
                    </div>
                    <button type="submit" class="btn btn-success waves-effect right">Edit post</button>
                </div>
            </div>
        </div>
    </form>
@endcomponent