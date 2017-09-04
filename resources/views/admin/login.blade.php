
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ url('public/admin/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ url('public/admin/signin.css') }}" rel="stylesheet">
  </head>

  <body>

    <div class="container">
      @if (count($errors) > 0)
      <div class="alert alert-danger">
          <ul>
              @foreach($errors->all() as $error)
              <li>{!! $error !!}</li>
              @endforeach
          </ul>
      </div>
      @endif
      @if (session('message'))
        <div class="alert alert-danger">
          {{session('message')}}
        </div>
      @endif

      <form class="form-signin" action="login" method="POST">
      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">User Name</label>
        <input type="text" id="txtUsername" name="txtUsername" class="form-control" placeholder="User name" value="{!! old('txtUsername') !!}" >
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="txtPassword" name="txtPassword" class="form-control" placeholder="Password">
        <input type="checkbox" id="remember" name="remember"> Remember me
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>
