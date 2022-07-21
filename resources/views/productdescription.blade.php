@extends('layouts.app')

@section('content')
  <section style="background-color: #eee;">
    <div class="container py-5">
      
      
        <div class="row justify-content-center mb-3">
          <div class="col">
            <div class="card shadow-0 border rounded-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                    <div class="bg-image hover-zoom ripple rounded ripple-surface">
                      <img src="/imgs/shuffle/slidernew/{{ $data['product']->imgs[0]->img }}"
                        class="w-100" />
                      <a href="#!">
                        <div class="hover-overlay">
                          <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-6 col-xl-6 pt-5">
                    <span class="text-bold h5 text-muted" >
                      {{ $data['product']->name }}
                    </span>
                    <div class="d-flex flex-row mt-3">
                      <div class="text-danger mb-1 me-2">
                        @for( $i = 0 ; $i < $data['product']->rate ; $i++ )
                          <i class="fa fa-star"></i>
                        @endfor
                      </div>
                      <span>{{ $data['product']->rate }}/5</span>
                    </div>
                    <div class="mt-1 mb-0 text-muted small">
                      <span>{{ $data['product']->description }}</span>
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
                    <div class="mb-2 text-muted small">
                      <p class="mt-4">this product has: <b><i> {{ count($data['comments']) }} comments</i></b></p>
                      @Auth
                        <form method="POST" action="{{ route('comment') }}">
                          @csrf
                          <input id="product_id" name="product_id" type="hidden" class="form-control" value="{{ $data['product']->id }}" >

                          <div class="row mb-3 border-top mt-3 pt-3">
                              <label for="comment" class="col-md-12 col-form-label">{{ __('Enter Your comment') }}</label>

                              <div class="col-lg-8 col-md-12 mt-2">
                                  <input id="comment" type="text" placeholder="Your Comment" class="form-control @error('comment') is-invalid @enderror" name="comment" value="{{ old('comment') }}" required autocomplete="comment">

                                  @error('comment')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="col-lg-4 col-md-12 mt-2">
                                <button type="submit" class="btn btn-success px-5">
                                    {{ __('Send') }}
                                </button>
                            </div>
                          </div>
                      </form>
                    @endAuth
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start pt-5">
                    <div class="d-flex flex-row align-items-center mb-1">
                      <h4 class="mb-1 me-1">{{ $data['product']->price }} $ </h4>
                      <span class="text-danger"><s>{{ $data['product']->price + 10 }} $</s></span>
                    </div>
                    <h6 class="text-success">Free shipping</h6>
                    <div class="d-flex flex-column mt-4">
                      <a class="text-light text-decoration-none" href="{{ route('add.to.cart', $data['product']->id) }}">
                        <button class="w-100 btn btn-primary btn-md" type="button">
                          Add To Cart
                        </button>
                      </a>
                      <a class="h3 text-decoration-none" href="{{ route('add.to.wish',$data['product']->id) }}"> 
                        <button class="w-100 btn btn-outline-primary btn-md mt-2" type="button">
                          Add to wishlist
                        </button>
                      </a>
                    </div>
                  </div>
                </div>

                <hr class="my-5">
                <h2 class="mb-2">other photos</h2>

                <div class="row">
                  @foreach( $data['product']->imgs as $img)
                  <div class="col-md-4 col-sm-12 mt-3">
                      <img src="/imgs/shuffle/slidernew/{{ $img->img }}" class="w-100" />
                  </div>
                  @endforeach
                </div>


                <hr class="my-5">
                <h2 class="mb-5">Comments</h2>

                <div class="row">
                  @foreach( $data['product']->comments as $comment)
                  <div class="col-md-4 col-sm-12">
                    <h3><b>{{ $comment->user->name }}</b></h3>
                    <p>{{ $comment->comment }}</p>
                    
                  </div>
                  @endforeach
                </div>

              </div>
            </div>
          </div>
        </div>
    </div>
  </section>
@endsection
