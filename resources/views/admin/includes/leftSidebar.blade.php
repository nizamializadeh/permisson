<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{asset('admin/images/user.png')}}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{auth()->user()->name }}
            </div>
            <div class="email">
                {{auth()->user()->email}}
            </div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="/profil/edit/{{Auth::user()->id}}"><i class="material-icons">person</i>Profile</a></li>

                    <li>
                        <a  href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i>Sign Out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>

                <li class="{{(request()->routeIs('author.index') || request()->routeIs('tag.index') || request()->routeIs('category.index')) ? 'active' : ''}}">
                    <a href="javascript:void(0);" class="menu-toggle ">
                        <i class="material-icons">fiber_new</i>
                        <span>News managment</span>
                    </a>
                    <ul class="ml-menu">

                        <li class="{{request()->routeIs('product.index') ? 'active' : ''}}">
                            <a href="{{route('product.index')}}">Products</a>
                        </li>
                        <li class="{{request()->routeIs('plan.index') ? 'active' : ''}}">
                            <a href="{{route('plan.index')}}">Plans</a>
                        </li>

                    </ul>
                </li>
            </ul>
        </div>

    <div class="legal">
        <div class="copyright">
            &copy; 2018 <a href="javascript:void(0);">NewsPortal</a>.
        </div>
    </div>
    <!-- #Footer -->
</aside>