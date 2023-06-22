<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{url('/home')}}">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/home')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/Category')}}">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/Product')}}">Product</a>
          </li>
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Logout</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
