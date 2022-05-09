@extends('multiauth::layouts.app')
<title> Uploading Images For {{$type}} {{$value->name}} </title>
@section('content')
<div class="mt-4 container">
@if ($value->title)
<h4> Uploading Images For {{$type}} {{$value->title}} {{$value->section ? $value->section : ""}} </h4>
@else
<h4> Uploading Images For {{$type}} {{$value->name}} {{$value->section ? $value->section : ""}} </h4>
@endif
    <form id="i_f">
      @csrf
        <div class="custom-file">
          <input type="file" class="custom-file-input" accept="image/x-png,image/gif,image/jpeg"  name="image" id="customFile">
          <label class="custom-file-label" for="customFile">Choose file</label>
          <input type="hidden" name="model" value="{{$type}}">
          <input type="hidden" name="id" value="{{$id}}">
          <div class="row">
            <div class="col-6">
              <button type="submit" class="mt-3  btn btn-block btn-success"> Submit </button>
            </div>

            {{-- if it's just product --}}
            @if ($type !== "GetArd")
            <div class="col-6">
              <a href="{{route('admin.home')}}" class="mt-3 btn-block btn btn-primary"> Home  </a>
            </div>
            @else
            <div class="col-6">
              <a href="{{route('ardproducts.create',$value->id)}}" class="mt-3 btn-block btn btn-primary"> Choose Products For This Look  </a>
            </div>
            @endif
            
          </div>
        </div>
      </form>
</div>
<br>

<br>
<hr>
<div id="errors" class="container bg-light text-center ">
</div>
<div class="container mt-3">
  <h5 id="text" style="display: none"> Recently Added Images for {{$value->name}} </h5>
  <div class="row" id="new_images">
   
  </div>
</div>
<div class="container mt-3">
  @if (count($value->images) > 0)
  <div class="row">
    @foreach ($value->images as $i=>$img)
    <div class="col-lg-4 mb-3">
    <img src="{{asset($img->url)}}" class="img-thumbnail" class="text-center">
    <form action="{{route('image.destroy',$img->id)}}" method="post">
      @csrf
      @method("DELETE")
      <button type="submit" class="btn btn-md mt-3 btn-block btn-outline-danger"> Delete </button>
    </form>
    </div>
    <br>    
    @endforeach
  </div>
  @else
  <h5 id=""> Nothing has been uploaded yet  </h5>
  @endif
</div>
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    $("#i_f").on('submit',function(e){
        e.preventDefault();
        $.ajaxSetup({
          headers: {
            'X-CSSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
    
        $.ajax({
            url:"/8ZaMMkK7CREDJQB/image/store",
            method:"POST",
            data:new FormData(this),
            contentType:false,
            dataType:false,
            enctype:"multipart/form-data",
            processData:false,
            cache:false,
            timeout:8000,
            success:function (data) {
                switch (data.status) {
                    case 200:
                        $("#errors").slideUp();
                        $("#text").show();
                        $("#new_images").prepend(
                            `<div class="col-lg-4 mt-2 mb-2">`+data.uploaded_image+`
                              <form action="{{url('/8ZaMMkK7CREDJQB/remove/image/`+data.image_id+`')}}" method="POST">
                              @csrf
                              @method("DELETE")
                              <button type="submit" class="btn btn-block btn-danger"> Delete </button>
                              </form>
                            </div>
                            `
                          );
                    break;
                    case 422:
                        $("#errors").empty();
                        $.each(data.errors,function (i,v) 
                        { 
                          $("#errors").append(`<h5> `+v+` </h5>`)
                        })
                        $("#errors").slideDown();
                    break;
                    case 001:
                        $("#errors").empty();
                        $("#errors").append(`<h5> `+data.message+` </h5>`)
                        $("#errors").slideDown();
                    break;
                    default:
                    window.location.reload();
                    break;
                }
            }
            ,
            error:function (e) {
                 console.log(e);
             }
        })
    })
})
</script>
<script>
  // Add the following code if you want the name of the file appear on select
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
  </script>

@endsection 