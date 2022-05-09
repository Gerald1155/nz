@extends('multiauth::layouts.app')
@section('content')
<title> Contact Text - Admin Panel </title>
<div class="container">
    <h4 class="mt-2">
        Contact Text
    </h4>
    <br>
   <div class="row">
    <div class="col-lg-12">
        <form action="{{route('text.store')}}" method="post">
            @csrf
            @method("POST")
            <select name="section" class="form-control">
                <option value="contact"> Contact </option>
            </select>
            <br>
            @if (count($contact) > 0)
                <textarea name="text" cols="30" class="form-control" id="contact" rows="10" placeholder="Contact Text">{{$contact[0]->text}}</textarea>
            @else
                <textarea name="text" cols="30" class="form-control" id="contact" rows="10" placeholder="Contact Text"></textarea>
            @endif
            <br>
            <button type="submit" class="btn btn-block btn-primary"> Submit </button>
        </form>
    </div>
   </div>
</div>

@endsection