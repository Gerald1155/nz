@extends('multiauth::layouts.app')
@section('content')
<div class="container">
    <h3 class="mt-2">
       Reviews - <a href="{{route('review.create')}}"> Add a new review </a>
    </h3>
    <br>
   <div class="row">
       @foreach ($reviews as $review)
       <div class="col-lg-4 border p-3"> 
        <h4> {{$review->name}} </h4> 
        <hr>
        <h5> {{$review->review}} </h4> 
        <br>
        <div class="row">
            <div class="col-6">
                <a href="{{route('review.edit',$review->id)}}" class="btn btn-block btn-primary"> Edit </a>    
            </div>   
            <div class="col-6">
                <form action="{{route('review.destroy',$review->id)}}" method="POST"> @csrf @method("DELETE") <button type="submit" class="btn btn-block btn-danger"> Delete </button> </form>
            </div>   
        </div> 
       </div>
       @endforeach

   </div>
</div>
@endsection