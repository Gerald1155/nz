@extends('multiauth::layouts.app')
<title> Portfolio Index </title>
@section('content')
    <br>
    <div class="row mt-5">
        <div class="col-lg-8">
            <h4> All Portfolios </h4>
        </div>
        <div class="col-lg-4">
            <a href="{{route('portfolio.create')}}" class="btn btn-block btn-primary"> Add a new portfolio </a>
        </div>
        @foreach ($portfolios as $portfolio)
        <div class="col-lg-4 mt-3 shadow-sm border-round ">
               <h4 class="text-dark"> {{$portfolio->name}} </h4>
               <img src="{{$portfolio->cover()}}" class="img-thumbnail">
               <hr>
               <h5> Description : {{$portfolio->description}} </h5>
               <hr>
               <h5> Uploaded Images For This Portfolio : {{count($portfolio->images)}} </h5>  
               <div class="row">
                   <div class="col-sm-12 p-1">
                       <a href="{{route('portfolio.show',$portfolio->id)}}" class="btn btn-secondary btn-block"> More </a>
                   </div>
                   <div class="col-sm-6 p-1">
                       <a href="{{route('portfolio.edit',$portfolio->id)}}" class="btn btn-block btn-primary"> Edit </a>
                   </div>
                   <div class="col-sm-6 p-1">
                       <form action="{{route('portfolio.destroy',$portfolio->id)}}" method="POST"> 
                        @csrf
                        @method("DELETE")  
                        <button type="submit" class="btn btn-danger btn-block"> Delete </button>  
                       </form>
                   </div>
               </div>
        </div>
        @endforeach
    </div>
@endsection
    
