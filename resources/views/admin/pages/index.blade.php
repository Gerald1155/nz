@extends('multiauth::layouts.app')
@section('content')
<div class="container">
    <h3 class="mt-2">
        Pages Images 
    </h3>
    <br>
   <div class="row">
       @foreach ($photos as $photo)
       <div class="col-lg-4 border p-3"> 
        <h4 style="text-transform: capitalize"> {{$photo->section}} </h4>
        <h4> Images For This Section : {{count($photo->images)}} </h4>
        <div class="row">
            <div class="col-12">
                <a href="{{route('image.create',["Pages",$photo->id]);}}" class="btn btn-block btn-primary"> Add and Delete Photos </a>    
            </div>   
        </div> 
       </div>
       @endforeach

   </div>
</div>
@endsection