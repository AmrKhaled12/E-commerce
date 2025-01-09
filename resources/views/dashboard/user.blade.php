@extends('layout.main')
@section('title')
Popular Categories
@endsection
@section('content')
<form action="{{route('fillteration')}}" method="get" class=" d-flex justify-content-between mb-4">
  @csrf
  <input type="text" name="name" class="form-control mx-2" placeholder="name">
  <button type="submit" class="btn btn-dark mx-2">Fillter</button>
</form>

<div class="card card-solid">
  <div class="card-body pb-0">
    <div class="row d-flex align-items-stretch">
      @if($categories->empty())
      <p> there is no categories</p>
      @endif
      @foreach($categories as $category)
      <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
        <div class="card bg-light">
          <div class="card-body pt-0">
            <div class="row">
              <div class="col-7">
                <h3 class="lead">{{$category->name}}</h3>
                @foreach($category->chaild as $chaild)
                <a href="#" class="btn btn-outline-secondary">{{$chaild->name}}</a>
                <style>
                  a:hover {
                    text-decoration: underline;
                    font-weight: bold;
                  }
                </style>
                  <br>
                  <br>
                
                @endforeach

                <a class="link-dark"> Everything is presented in this section </a>
              </div>
              <div class="col-5 text-center">
                <img src="{{asset('assets/system-image/'.$category->name.'.jpg')}}" alt="" class="img-circle img-fluid">
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

  </div>
</div>
</div>

@endsection