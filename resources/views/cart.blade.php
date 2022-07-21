@extends('layouts.app')

@section('content')

  <section class="h-100 h-custom" style="background-color: #eee;">
    <div class="container py-3 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
          <div class="card card-registration card-registration-2" style="border-radius: 15px;">
            <div class="card-body p-0">
              <div class="row g-0">
                <div class="col-lg-8">
                  <div class="p-5">
                    <div class="d-flex justify-content-between align-items-center mb-5">
                      <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                      <h6 class="mb-0 text-muted">{{ count($data['cart']) }} items</h6>
                    </div>
                    @if (count($data['cart'])>0)
                      <hr class="my-4">
                      @foreach ($data['cart'] as $item)
                        
                      <div class="row mb-4 d-flex justify-content-between align-items-center">
                        <div class="col-md-2 col-lg-2 col-xl-2">
                          <img
                            src="/imgs/shuffle/slidernew/{{ $item['image']['img'] }}"
                            class="img-fluid rounded-3" alt="{{ $item['name'] }}">
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-3">
                          <h6 class="text-muted"> {{ $item['category']['name'] ?? "not categorized" }} </h6>
                          <h6 class="text-black mb-0">{{ $item['name'] }}</h6>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                          <button class="btn btn-link px-2"
                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                            <i class="fas fa-minus"></i>
                          </button>

                          <input id="form1" min="0" name="quantity" value="{{ $item['quantity'] }}" type="number"
                            class="form-control form-control-sm" />

                          <button class="btn btn-link px-2"
                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                            <i class="fas fa-plus"></i>
                          </button>
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                          <h6 class="mb-0">total: {{ $item['quantity'] * $item['price'] }}</h6>
                          <h6 class="mb-0"></h6>
                        </div>
                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                          <a href="{{ route('remove.from.cart',$item['id']) }}" class="text-muted"><i class="fas fa-times"></i></a>
                        </div>
                      </div>
                      <hr class="my-4">

                      @endforeach

                      <div class="pt-5">
                        <h6 class="mb-0"><a href="/ " class="text-body"><i
                              class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 bg-grey">
                    <div class="p-5">
                      <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                      <hr class="my-4">

                      <div class="d-flex justify-content-between mb-4">
                        <h5 class="text-uppercase">items: {{ count($data['cart']) }} </h5>
                        <h5>$ {{ $data['total'] }} </h5>
                      </div>

                      <form method="POST" action="{{ route('order') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="address" class="col-md-12 col-form-label">{{ __('Enter Your Address') }}</label>

                            <div class="col-md-12">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('adress') }}" required autocomplete="adress">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-12 col-form-label">{{ __('Enter Your Phone') }}</label>

                            <div class="col-md-12">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row my-4">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success px-5">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                  @else
                    <h2 class="text-center"> there is no items yet </h2>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
