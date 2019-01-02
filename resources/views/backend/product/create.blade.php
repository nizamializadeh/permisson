@component('admin.components.form',$setting)
    {{-- Component content--}}
    <form id="form_validation" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row clearfix">
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="name" type="text" required class="form-control">
                        <label class="form-label">Name</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="desc" type="text" required class="form-control">
                        <label class="form-label">Description</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="price" type="number" required class="form-control">
                        <label class="form-label">Price</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="photo[]" type="file" required class="form-control  post-image" id="postImage" multiple>

                        {{--<label for="postImage" style="cursor: pointer">--}}
                        {{--<img class="img-responsive thumbnail post-img-preview" src="{{asset('admin/images/image-gallery/thumb/thumb-15.jpg')}}">--}}
                        {{--</label>--}}
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="demo-switch">
                    <button type="submit" class="btn btn-success waves-effect right">Create product</button>
                </div>
            </div>
        </div>
    </form>
@endcomponent