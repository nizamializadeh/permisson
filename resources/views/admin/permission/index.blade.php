
    <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
            <form action="{{route('save_role_permission')}}" method="post">
                @csrf
                <select name="role" id="">
                    @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
                <br>
                @foreach($tables as $table)
                    <span>{{head($table)}}</span>
                    <br>
                    @foreach($permissions as $permission)
                        <input name="permissions[{{head($table)}}][]" type="checkbox" value="{{$permission->id}}">
                        <label >{{$permission->name}}</label>
                    @endforeach
                    <br>
                @endforeach
                <button type="submit">save</button>
            </form>
        </div>
    </div>
