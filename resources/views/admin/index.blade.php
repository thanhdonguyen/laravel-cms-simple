
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ url('public/admin/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ url('public/admin/signin.css') }}" rel="stylesheet">
  </head>

  <body>

    <div class="container">
    {!! Auth::user()->name !!}
    <a href="{!! url('logout') !!}">Logout</a>
    <ul class="nav nav-pills nav-fill">
      <li class="nav-item">
        <a class="nav-link" href="{{ URL::route('admin.news.getList') }}">List title</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ URL::route('admin.user.getList') }}">List User</a>
      </li>
     <!--  <li class="nav-item">
        <a class="nav-link" href="#">Longer nav link</a>
      </li> -->
    </ul>
    
    
        @yield('content')
    
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script>
      function confirmDelete (msg){
          if(window.confirm(msg)){
            return true;
          }
          return false;
        }
    </script>
  </body>
</html>
