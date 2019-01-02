@extends('admin.backend')
@section('content')
    <div class="container-fluid">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <div class="icon bg-red">
                    <i class="material-icons">face</i>
                </div>
                <div class="content">
                    <div class="text">Users</div>
                    <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20">{{$user->count()}}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <div class="icon bg-red">
                    <i class="material-icons">local_post_office</i>
                </div>
                <div class="content">
                    <div class="text">Post</div>
                    <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20">{{$post->count()}}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <div class="icon bg-red">
                    <i class="material-icons">tag_faces</i>
                </div>
                <div class="content">
                    <div class="text">Tag</div>
                    <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20">{{$tag->count()}}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <div class="icon bg-red">
                    <i class="material-icons">tune</i>
                </div>
                <div class="content">
                    <div class="text">Category</div>
                    <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20">{{$category->count()}}</div>
                </div>
            </div>
        </div>


    </div>

    @component('backend.components.table',$settings)
        <div class="container-fluid">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <div class="icon bg-red">
                        <i class="material-icons">face</i>
                    </div>
                    <div class="content">
                        <div class="text">Users</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20">{{$user->count()}}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <div class="icon bg-red">
                        <i class="material-icons">local_post_office</i>
                    </div>
                    <div class="content">
                        <div class="text">Post</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20">{{$post->count()}}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <div class="icon bg-red">
                        <i class="material-icons">tag_faces</i>
                    </div>
                    <div class="content">
                        <div class="text">Tag</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20">{{$tag->count()}}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <div class="icon bg-red">
                        <i class="material-icons">tune</i>
                    </div>
                    <div class="content">
                        <div class="text">Category</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20">{{$category->count()}}</div>
                    </div>
                </div>
            </div>


        </div>

        {{-- Component content--}}
        @foreach($contactforums as $contactforum)
            <tr>
                <td>{{$contactforum->id}}</td>
                <td>{{$contactforum->name}}</td>

                <td>{{$contactforum->surname}}</td>
                <td>{{$contactforum->email}}</td>
                <td>{{$contactforum->phone}}</td>
                <td>{{$contactforum->message}}</td>
                <td>{{date('j M Y', strtotime($contactforum->created_at))}}</td>

            </tr>
        @endforeach

    @endcomponent
@endsection