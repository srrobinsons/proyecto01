  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="{{ route('l_home') }}">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('l_usuarios') }}">Usuarios <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('l_nuevo') }}">Nuevo</a>
        </li>

      </ul>
<!--        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li> 
      </ul>

      <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
      -->
    </div>
  </nav>

<!--
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container">
    <a href="{{ route('l_usuarios') }}" class="btn btn-primary">Usuarios</a>
    <a href="{{ route('l_nuevo') }}" class="btn btn-primary">Nuevo</a>
  </div>
</nav>  
-->  



