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
      <h1>List User</h1>
      <a href="{{ URL::route('admin.user.getInsert') }}">Add new user</a>
      <table class="table table-bordered" style="background-color:#d5edf2">
        <thead>
          <tr>
            <th>#</th>
            <th>User</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        <?php $stt = 0 ?>
        @foreach($ListUser as $list)
         <?php $stt = $stt + 1 ?>
          <tr>
            <th scope="row">{!! $stt !!}</th>
            <td><a href="{{ URL::route('admin.user.getEdit',$list['id']) }}">
       <input type="hidden" name="_token" value="{!! csrf_token() !!}">{!! $list['name'] !!}</a></td>
            <td><a href="{{ URL::route('admin.user.getEdit',$list['id']) }}">Edit</a></td>
            <td><a onclick="return confirmDelete('Are you sure you want to delete ?')" href="{{ URL::route('admin.user.getDelete',$list['id']) }}">Delete</a></td>
          </tr>
        @endforeach
        </tbody>
      </table>
@endsection