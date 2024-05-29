<nav class="navbar navbar-expand-lg bg-dark p-0">
  <div class="container-fluid h-100 p-0 ps-3">

    <div class="h-100 collapse navbar-collapse d-flex flex-md-row-reverse justify-content-between" id="navbarNavDropdown">

      <ul class="navbar-nav h-100">
        <li class="nav-item h-100">
          <a class="align-content-center h-100 nav-link  text-white" target="_blanck" href="{{ route('home') }}">Guest
            Home</a>
        </li>
        <li class="nav-item">
          <a class="align-content-center h-100 nav-link  text-white" target="_blanck"
            href="{{ route('admin.home') }}">Admin Home</a>
        </li>
        <li class="nav-item">
          <a class="align-content-center h-100 nav-link  text-white" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
        <li class="nav-item">
          <a class="align-content-center h-100 nav-link  text-white"
            href="{{ url('profile') }}">{{ Auth::user()->name }}</a>
        </li>
      </ul>
      <form action="{{ route('admin.project.index') }}" method="GET" class="d-flex m-0" role="search">
        <input name="toSearch" class="text-white rounded-2 me-2 bg-black border-primary px-2" type="search"
          placeholder="Search">
        <button class="btn btn-outline-primary" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
