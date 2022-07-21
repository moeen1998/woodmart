@extends('layouts.app')

@section('content')
  <section style="background-color: #eee;">
    <div class="container py-5">
      <h2>our collection of <i><b> {{ $data['categoryname'] }}</b> :-</i></h2>
      @foreach ($data['products'] as $product)
        <div class="row justify-content-center mb-3">
          <div class="col">
            <div class="card shadow-0 border rounded-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                    <div class="bg-image hover-zoom ripple rounded ripple-surface">
                      <img src="/imgs/shuffle/slidernew/{{ $product->imgs[0]->img }}"
                        class="w-100" />
                      <a href="#!">
                        <div class="hover-overlay">
                          <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-6 col-xl-6 pt-5">
                    <a class="text-bold h5 text-muted" href="{{ route('product.details',$product->id) }}">
                      {{ $product->name }}
                    </a>
                    <div class="d-flex flex-row mt-3">
                      <div class="text-danger mb-1 me-2">
                        @for( $i = 0 ; $i < $product->rate ; $i++ )
                        <i class="fa fa-star"></i>
                        @endfor
                      </div>
                      <span>{{ $product->rate }}/5</span>
                    </div>
                    <div class="mt-1 mb-0 text-muted small">
                      <span>{{ $product->description }}</span>
                    </div>
                    <div class="mb-2 text-muted small">
                      <span>Unique design</span>
                      <span class="text-primary"> • </span>
                      <span>Casual<br /></span>
                    </div>
                    <p class="text-truncate mb-4 mb-md-0">
                      There are many variations of passages of Lorem Ipsum available, but the
                      majority have suffered alteration in some form, by injected humour, or
                      randomised words which don't look even slightly believable.
                    </p>
                  </div>
                  <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start pt-5">
                    <div class="d-flex flex-row align-items-center mb-1">
                      <h4 class="mb-1 me-1">{{ $product->price }} $ </h4>
                      <span class="text-danger"><s>{{ $product->price + 10 }} $</s></span>
                    </div>
                    <h6 class="text-success">Free shipping</h6>
                    <div class="d-flex flex-column mt-4">
                      <a class="text-light text-decoration-none" href="{{ route('product.details',$product->id) }}">
                        <button class="w-100 btn btn-primary btn-md" type="button">
                          Details
                        </button>
                      </a>
                      <a class="h3 text-decoration-none" href="{{ route('add.to.wish',$product->id) }}"> 
                        <button class="w-100 btn btn-outline-primary btn-md mt-2" type="button">
                          Add to wishlist
                        </button>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </section>
@endsection
