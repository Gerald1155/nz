@extends('multiauth::layouts.app')
@section('content')
<title> Edit Review - Admin Panel </title>
<div class="container">
    <h4 class="mt-2">
        Edit Review
    </h4>
    <br>
   <div class="row">
    <div class="col-lg-12">
        <form action="{{route('review.update',$review->id)}}" method="post">
            @csrf
            @method("PUT")
            <input type="text" class="form-control" value="{{$review->name}}" name="name" placeholder="name">
            <br>
            <label for="content"> Review </label>
            <textarea name="review" class="form-control" placeholder="Review" cols="30" rows="10">{{$review->review}}</textarea>
            <br>
            <button type="submit" class="btn btn-block btn-primary"> Update </button>
        </form>
    </div>


   </div>
</div>


@endsection