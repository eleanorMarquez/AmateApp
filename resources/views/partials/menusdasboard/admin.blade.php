
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard.index')}}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Inicio</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('usuarios.index')}}">
          <i class="menu-icon mdi mdi-account-multiple"></i>
          <span class="menu-title">Usuarios Profesionales</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('pacientes.index')}}">
          <i class="menu-icon mdi mdi-account-multiple"></i>
          <span class="menu-title">Usuarios Pacientes</span>
        </a>
      </li>
      <li class="nav-item nav-category">Gestión de Noticias</li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('noticia.index')}}">
          <i class="menu-icon mdi mdi-newspaper"></i>
          <span class="menu-title">Noticias</span>
        </a>
      </li>
      <li class="nav-item nav-category">Gestión de Eventos</li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('evento.index')}}">
          <i class="menu-icon mdi mdi-calendar-text"></i>
          <span class="menu-title">Eventos</span>
        </a>
      </li>
      <li class="nav-item nav-category">Gestión de Directorio</li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('directorio.index')}}">
          <i class="menu-icon mdi mdi-clipboard-account"></i>
          <span class="menu-title">Directorio</span>
        </a>
      </li>
    </li><li class="nav-item nav-category">Preguntas del test</li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('questions.index')}}">
        <i class="menu-icon mdi mdi-comment-question-outline"></i>
        <span class="menu-title">Preguntas</span>
      </a>
    </li>
    