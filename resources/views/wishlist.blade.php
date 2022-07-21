@extends('layouts.app')

@section('content')
  <section style="background-color: #eee;">
    <div class="container py-3">
      <div class="row justify-content-center">
            
        @if (count($data['wish'])>0)
            @foreach ($data['wish'] as $item)
            <div class="col-md-8 col-lg-6 col-xl-4">
              <div class="card text-black">
                <img src="/imgs/shuffle/slidernew/{{ $item['image']['img'] }}"
                  class="card-img-top" alt="Apple Computer" />
                <div class="card-body">
                  <div class="text-center">
                    <h5 class="card-title">{{ $item['name'] }}</h5>
                  </div>
                  <div>
                    <div class="d-flex justify-content-between">
                      <span>{{ $item['description'] }}</span>
                    </div>
                  </div>
                  <div class="d-flex justify-content-between total font-weight-bold mt-4">
                    <span>price</span><span>{{ $item['price'] }}</span>
                  </div>
                  <div class="d-flex justify-content-between total font-weight-bold mt-4">
                    <a class="h3 text-decoration-none" href="{{ route('add.to.cart',$item['id']) }}"> 
                      <button class="btn btn-outline-success btn-md mt-2" type="button">
                        Add to cart
                      </button>
                    </a>
                    <a class="h3 text-decoration-none" href="{{ route('remove.from.wish',$item['id']) }}"> 
                      <button class="btn btn-outline-danger btn-md mt-2" type="button">
                        Remove From Wish List
                      </button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        @else
            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
              <div class="card-body p-0">
                <div class="row g-0">
                  <div class="col">
                    <div class="p-5">
                      <div class="border-bottom d-flex justify-content-between align-items-center mb-5">
                        <h1 class="fw-bold mb-0 text-black">wish list</h1>
                        <h6 class="mb-0 text-muted">{{ count($data['wish']) }} items</h6>
                      </div> 
                      <h2 class="text-center"> there is no items yet </h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        @endif
        
      </div>
    </div>
  </section>
@endsection
