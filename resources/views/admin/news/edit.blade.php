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
      <h1>Edit : {{ $NewsEdit->title }}</h1>
      <form method="POST" action="{{ URL::route('admin.news.postEdit',$NewsEdit->id) }}">
       <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="form-group">
          <label for="formGroupExampleInput">Title</label>
          <input type="text" class="form-control" id="formGroupExampleInput" name="formGroupExampleInput" value="{{ $NewsEdit->title }}" >
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">text</label>
          <textarea class="form-control" rows="15" name="comment" id="comment">{{ $NewsEdit->text }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
      </form>
@endsection