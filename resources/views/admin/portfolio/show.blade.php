@extends('multiauth::layouts.app')
<title> Portfolio : {{$portfolio->name}} </title>
@section('content')
<br>
<br>
<div class="row">
    <div class="col-lg-12">
        <h3> Portfolio name : {{$portfolio->name}} </h3>
    </div>
    <div class="col-6 ml-auto"> 
        <a href="{{route('portfolio.edit',$portfolio->id)}}" class="btn btn-block btn-primary"> Edit </a>
    </div>
    <div class="col-6 "> 
        <form action=""> 
            @csrf
            @method("DELETE")  
            <button type="submit" class="btn btn-danger btn-block"> Delete </button>  
        </form>   
    </div>
</div>
<hr>
<h4> Description : {{$portfolio->description}} </h4>
<hr>
<h4> Uploaded Images For This Portfolio  </h4>
<div class="row">
    @foreach ($portfolio->images as $image)
    <div class="col-lg-4 p-3 rounded-lg">
        <img src="{{asset($image->url)}}" class="img-thumbnail">
    </div>
    @endforeach

</div>

@endsection