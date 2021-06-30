<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container">
    <a href="/"> <img
        src="https://gist.githubusercontent.com/T-Jedsada/dbee22959762fa6c0ccad8153830b51a/raw/8957088c2e31dba6d72ce86c615cb3c7bb7f0b0c/nyan-cat.gif"
        alt="wiBox" width="92px" height="42px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto"></ul>
      <ul class="navbar-nav ml-auto">
        @guest
        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
        @else
        <li><a class="nav-link" href="{{ route('files.index') }}">Subir Imágenes</a></li>
        <li><a class="nav-link" href="{{ route('users.index') }}">Administrar Usuarios</a></li>
        <li><a class="nav-link" href="{{ route('roles.index') }}">Administrar Roles</a></li>
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
              {{ __('Cerrar Sesión') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>