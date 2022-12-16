<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    @hasrole('Admin')
      @include('partials.menusdasboard.admin')
    @endhasrole

    @hasanyrole('Juridico|Psicologo')
      @include('partials.menusdasboard.profesional')
    @endhasrole

    @hasrole('Usuario')
      @include('partials.menusdasboard.user')
    @endhasrole
    <li class="nav-item nav-category">Cuenta</li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('usuario.perfil') }}">
          <i class="menu-icon mdi mdi-account-circle-outline"></i>
          <span class="menu-title">Perfil</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
          <i class="menu-icon mdi mdi-logout-variant"></i>
          <span class="menu-title">Salir</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
      </form>
      </li>
  </ul>
</nav>