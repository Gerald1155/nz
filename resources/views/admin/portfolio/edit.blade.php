@extends('multiauth::layouts.app')
<title> Edit {{$portfolio->name}}  </title>
@section('content')
<br>
<br>
<h4> {{$portfolio->name}}</h4>
    <br>
    <form action="{{route('portfolio.update',$portfolio->id)}}" method="POST">
        @csrf
        @method("PATCH")
        <div class="form-group">
          <label for="name">title Of The Portfolio:</label>
          <input type="text" class="form-control" placeholder="title of The Portfolio" value="{{$portfolio->name}}" name="name" id="title">
          <br>
          <label for="title"> Description Of The portfolio:</label>
          <textarea name="description" placeholder="Description Of The Portfolio" class="form-control" cols="30" rows="10">{{$portfolio->description}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-block"> Edit </button>
      </form>
<br>
<br>
<br>
@endsection
    
