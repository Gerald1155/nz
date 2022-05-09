@extends('multiauth::layouts.app')
<title> Add a new portfolio  </title>
@section('content')
<br>
<br>
<h4> Create Portfolio </h4>
    <br>
    <form action="{{route('portfolio.store')}}" method="POST">
        @csrf
        @method("POST")
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" placeholder="Name of The Portfolio" name="name" id="title">
          <br>
          <label for="title"> Description :</label>
          <textarea name="description" placeholder="Description Of The Portfolio" class="form-control" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-block"> Create </button>
      </form>
<br>
<br>
<br>
@endsection
    
