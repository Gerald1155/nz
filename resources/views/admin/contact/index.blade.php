@extends('multiauth::layouts.app')
<title> Contact Us List  </title>
@section('content')
    <br>
    <div class="row mt-5">
        <div class="col-lg-8">
            <h3> Contact Us List - Total {{count($contacts)}}</h3>
        </div>
        @foreach ($contacts as $contact)
        <div class="col-lg-12 mt-4 p-3 shadow-sm border-round ">
               <div class="row">
                   <div class="col-lg-4">
                    <h4>Name : {{$contact->name}}</h4>
                   </div>
                   <div class="col-lg-4">
                    <h4>Email : {{$contact->email}}</h4>
                   </div>
                   <div class="col-lg-4">
                    <h4>Phone : {{$contact->phone}}</h4>
                   </div>
                   <div class="col-lg-4">
                    <h4>Type : {{$contact->type}}</h4>
                   </div>
                   <div class="col-lg-4">
                    <h4>Description : {{$contact->description}}</h4>
                   </div>
                   <div class="col-lg-4">
                    <h5> Created : {{ Carbon\Carbon::parse($contact->created_at)->diffForHumans()}} </h5>  
                   </div>
               </div>
               <hr>
               <div class="row">
                   <div class="col-12">
                       <form action="{{route('contact.destroy',$contact->id)}}" method="POST"> 
                        @csrf
                        @method("DELETE")  
                        <button type="submit" class="btn btn-danger"> Delete </button>  
                       </form>
                   </div>
               </div>
        </div>
        @endforeach

    </div>
@endsection
    
