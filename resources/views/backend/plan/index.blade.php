@component('admin.components.table',$settings)
    {{-- Component content--}}
    @foreach($plans as $plan)
        <tr>
            <td>{{$plan->id}}</td>
            <td>{{$plan->name}}</td>
            <td>{{$plan->price}}</td>
            <td>{{$plan->count}}</td>

            <td>
                <form action="{{url('user/plan/added/'.$plan->id)}}" method="post" class="form-horizontal form-label-left">
                    @csrf
                    <button type="submit" class="btn btn-default waves-effect">
                        <i class="material-icons">trending_up</i>
                    </button>
                </form>

            </td>
        </tr>
    @endforeach
@endcomponent