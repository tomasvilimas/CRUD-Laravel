<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item {{ Request::routeIs('index') ? 'active' : '' }}">
          <a class="nav-link" href="/">Home</span></a>
        </li>
        <li class="nav-item {{ Request::routeIs('about') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('about') }}">About</a>
        </li>
        
      <li class="nav-item {{ Request::routeIs('posts.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('posts.index')}}">Projektai</a>
      </li>

    </div>
    {{ Auth::user()['name'] }}
</div>



        
      </ul>
    </div>
  </nav>
  