
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard.index')}}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Inicio</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('pacientes.index')}}">
          <i class="menu-icon mdi mdi-account-multiple"></i>
          <span class="menu-title">Usuarios Registrados</span>
        </a>
      </li>
      <li class="nav-item nav-category">Gestión de Citas</li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('citation.index')}}">
          <i class="menu-icon mdi mdi-bookmark-check"></i>
          <span class="menu-title">Disponibilidad de Citas</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('citation.agendadas')}}">
          <i class="menu-icon mdi mdi-calendar-plus"></i>
          <span class="menu-title">Citas Agendadas</span>
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