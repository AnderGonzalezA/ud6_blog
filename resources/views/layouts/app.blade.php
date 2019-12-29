<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#563d7c">

  <title>ud6_laravel_roles_blog_base</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/dashboard/">
  <!-- Bootstrap core CSS -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('css/blog-post.css')}}" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">

  <script src="{{ URL::asset('js/dashboard.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <style type="text/css">
    @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}
  </style>
</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Ander Gonzalez Ameztoy</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('blog')}}">Blog
              <span class="sr-only">(current)</span>
            </a>
          </li>
          @guest
            <li class="nav-item active">
              <a class="nav-link" href="{{route('login')}}">Login
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="{{route('register')}}">Register
                <span class="sr-only">(current)</span>
              </a>
            </li>
          @else
            @if (Auth::user()->hasRole("editor"))
              <li class="nav-item active">
                <a class="nav-link" href="{{route('posts.index')}}">Posts
                  <span class="sr-only">(current)</span>
                </a>
              </li>
            @else
              <li class="nav-item active">
                <a class="nav-link" href="{{route('admin')}}">Users
                  <span class="sr-only">(current)</span>
                </a>
              </li>
            @endif
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              Log out
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                @csrf
              </form>
            </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    @yield('content')
  </div>
  <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Desarrollo web en entorno servidor 2020</p>
    </div>
    <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>
