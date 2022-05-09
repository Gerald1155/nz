@extends('multiauth::layouts.app')
@section('content')
<title> Add Review - Admin Panel </title>
<div class="container">
    <h4 class="mt-2">
        Add Review
    </h4>
    <br>
   <div class="row">
    <div class="col-lg-12">
        <form action="{{route('review.store')}}" method="post">
            @csrf
            @method("POST")
            <input type="text" class="form-control" name="name" placeholder="name">
            <br>
            <label for="content"> Review </label>
            <textarea name="review" class="form-control" placeholder="Review" cols="30" rows="10"></textarea>
            <br>
            <button type="submit" class="btn btn-block btn-primary"> Submit </button>
        </form>
    </div>


   </div>
</div>


@endsection