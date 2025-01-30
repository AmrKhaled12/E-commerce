@extends('layout.main')
@push('style')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('assets/product/css/vendor.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/product/css/style.css')}}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
@endpush
@push('script')
<script src="{{asset('assets/product/js/jquery-1.11.0.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="{{asset('assets/product/js/plugins.js')}}"></script>
<script src="{{asset('assets/product/js/script.js')}}"></script>
@endpush
@section('title')
products
@endsection
@section('content')
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <defs>
        <symbol xmlns="http://www.w3.org/2000/svg" id="heart" viewBox="0 0 24 24">
          <path fill="currentColor" d="M20.16 4.61A6.27 6.27 0 0 0 12 4a6.27 6.27 0 0 0-8.16 9.48l7.45 7.45a1 1 0 0 0 1.42 0l7.45-7.45a6.27 6.27 0 0 0 0-8.87Zm-1.41 7.46L12 18.81l-6.75-6.74a4.28 4.28 0 0 1 3-7.3a4.25 4.25 0 0 1 3 1.25a1 1 0 0 0 1.42 0a4.27 4.27 0 0 1 6 6.05Z"/>
        </symbol>
      </defs>
    </svg>
    
<div class="tab-content" id="nav-tabContent">

    <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
    
        <div class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
        @foreach($products as $product)
            <div class="col">
                <div class="product-item">
                    <span class="badge bg-success position-absolute m-3">-30%</span>
                    <a href="#" class="btn-wishlist"><svg width="24" height="24">
                            <use xlink:href="#heart"></use>
                        </svg></a>
                    <figure>
                    @if($product->images->count() > 0)
                        <a href="{{route('show-item',$product->id)}}" title="Product Title">
                            <img src="{{asset('storage/images/'.$product->images[0]->path)}}" class="tab-image">
                        </a>
                        @else
                        <a href="{{route('show-item',$product->id)}}" title="Product Title">
                            <img src="{{asset('storage/default.jpg')}}" class="tab-image">
                        </a>
                        @endif
                    </figure>
                    <h3>{{$product->name}}</h3>
                    <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary">
                            <use xlink:href="#star-solid"></use>
                        </svg> 4.5</span>
                    <span class="price">${{$product->price}}</span>
                    <form action="{{route('add-to-cart')}}" method="post">
                        @csrf
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="input-group product-qty">
                            <span class="input-group-btn">
                                <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                                    <svg width="16" height="16">
                                        <use xlink:href="#minus"></use>
                                    </svg>
                                </button>
                            </span>
                            <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
                            <input type="number" hidden name="product_id" value="{{$product->id}}">
                            <span class="input-group-btn">
                                <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                    <svg width="16" height="16">
                                        <use xlink:href="#plus"></use>
                                    </svg>
                                </button>
                            </span>
                        </div>
                        <button type="submit" class="nav-link">Add to Cart <iconify-icon icon="uil:shopping-cart"></a>
                    </div>
                    </form>
                </div>
            </div>

            @endforeach
        </div>
       
    </div>
    
</div>


@endsection