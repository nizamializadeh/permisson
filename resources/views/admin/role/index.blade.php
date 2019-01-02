    <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
            <form action="{{route('save_role_add')}}" method="post">
                @csrf
                <select name="user_id" id="">
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                <select name="role_id" id="">
                    @foreach($role as $roles)
                        <option value="{{$roles->id}}">{{$roles->name}}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-secondary">add</button>
            </form>
        </div>
    </div>
