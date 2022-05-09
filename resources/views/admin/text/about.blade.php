@extends('multiauth::layouts.app')
@section('content')
<title> About Text - Admin Panel </title>
<div class="container">
    <h4 class="mt-2">
        About Text
    </h4>
    <br>
   <div class="row">
    <div class="col-lg-12">
        <form action="{{route('text.store')}}" method="post">
            @csrf
            @method("POST")
            <select name="section" class="form-control">
                <option value="about"> about </option>
            </select>
            <br>
            @if (count($about) > 0)
                <textarea name="text" id="about" cols="30" class="form-control" rows="10" placeholder="About Text">{{$about[0]->text}}</textarea>
            @else
                <textarea name="text" id="about" cols="30" class="form-control" rows="10" placeholder="About Text"></textarea>
            @endif
         
            <br>
            <button type="submit" class="btn btn-block btn-primary"> Submit </button>
        </form>
    </div>
   </div>
</div>


@endsection