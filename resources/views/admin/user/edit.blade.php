@extends('admin.index')
@section('content')
  @if (!isset(Auth::user()->name))
      <?php return redirect('login') ?>
      @endif
      <br><br>
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
        <div class="alert alert-success">
          {{session('message')}}
        </div>
      @endif
      <h1>Edit : {{ $user->name }}</h1>
      <form method="POST" action="{{ URL::route('admin.user.postEdit',$user->id) }}">
       <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="form-group">
          <label for="formGroupExampleInput">User name</label>
          <input type="text" class="form-control" id="txtUser" name="txtUser" value="{{ $user->name }}" >
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput">New Password</label>
          <input type="password" class="form-control" id="txtPass" name="txtPass" value="" >
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput">Re-Password</label>
          <input type="password" class="form-control" id="txtRePass" name="txtRePass" value="" >
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput">Email</label>
          <input type="text" class="form-control" id="txtEmail" name="txtEmail" value="{{ $user-> email }}" >
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
      </form>
@endsection