<nav>
    <div class="navbar navbar-default header">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">TestProject</a>
            </div>

            <div class="navbar-collapse collapse navbar-inverse-collapse">
                <ul class="nav navbar-nav">
                    @if(auth()->check())
                        <li>
                            <a href="{{ route('profile') }}">Профиль</a>
                        </li>
                    @endif
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if(auth()->guest())
                        <li><a href="{{ route('registration') }}">Зарегистрироваться</a></li>
                        <li><a href="{{ route('login') }}">Войти</a></li>
                    @else
                        <li><a href="{{ route('logout') }}">Выйти</a></li>
                    @endif

                </ul>
            </div>
        </div>
    </div>
</nav>