<ul class="navbar-nav mx-auto">
    @guest
        @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
            </li>
        @endif
    @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                @if(Auth::user()->role == 'admin')
                    <a class="dropdown-item" href="{{ route('admin.index') }}">
                        {{ __('Quản trị viên') }}
                    </a>
                @endif


                <a class="dropdown-item" href="{{ route('logout') }}">
                    {{ __('Đăng xuất') }}
                </a>
            </div>
        </li>
    @endguest
</ul>