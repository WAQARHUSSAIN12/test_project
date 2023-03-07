
@extends("layout.layout")
@section("title","home page")
@section("content")
<div class="row">
  <div class="col-sm-4">
  </div>
  <div class="col-sm-4">

  @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
  @endif
   
  
      <form method="post" action="{{ route('update') }}">
        @csrf
        @foreach($items as $item)
          <div class="form-group ">
            <label for="inputEmail4">{{$item->itemNo}}</label>
            <input type="text" 
            class="form-control"
            name="item[]"  
            id="inputEmail4"
            value="{{$item->item}}"
            >
            <input type="hidden" 
            class="form-control"
            name="ids[]"  
            id="inputEmail4"
            value="{{$item->id}}"
            >

          <input type="hidden" 
            class="form-control"
            name="order[]"  
            id="inputEmail4"
            value="{{$item->shlef}}"
            >
          </div>
        @endforeach
        <div class="form-group ">
            <input type="submit" 
            class="form-control btn btn-primary"
            name="update"  
            id="inputEmail4"
            value="update"
            >
          </div>
      </form>
  </div>
  <div class="col-sm-4">

  </div>
@endsection
