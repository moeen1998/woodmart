@extends('layouts.app')

@section('content')

  <section class="h-100" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card border-top border-bottom border-3" style="border-color: #84b736 !important;">
            <div class="card-body p-5">

              <p class="lead fw-bold mb-3" style="color: #84b736;">Your orders is : {{ count($data['orders']) }}</p>

              @foreach ($data['orders'] as $order)
              
                <div class="row mt-4 border-top pt-3">
                  <div class="col mb-3">
                    <p class="small text-muted mb-1">Date</p>
                    <p>{{ $order->created_at }}</p>
                  </div>
                  <div class="col mb-3">
                    <p class="small text-muted mb-1">Order No.</p>
                    <p>{{ $order->id }}</p>
                  </div>
                </div>

                @foreach ($order->products as $product)
                <div class="mx-n5 px-5 py-4" style="background-color: #f2f2f2;">
                  <div class="row">
                    <div class="col-md-8 col-lg-9">
                      <p>{{ $product->product->name }}</p>
                    </div>
                    <div class="col-md-4 col-lg-3">
                      <p>{{ $product->product->price }}</p>
                    </div>
                  </div>
                </div>    
                @endforeach
                <div class="row my-4">
                  <div class="col-md-4 offset-md-8 col-lg-3 offset-lg-9">
                    <p class="lead fw-bold mb-0" style="color: #84b736;">{{ $order->total }}</p>
                  </div>
                </div>

                <p class="lead fw-bold mb-4 pb-2" style="color: #84b736;">Tracking Order</p>

                <div class="row">
                  <div class="col-lg-12">
  
                    <div class="horizontal-timeline">
  
                      <ul class="list-inline items d-flex justify-content-between">
                        <li class="list-inline-item items-list">
                          <p class="py-1 px-2 rounded text-white" style="background-color: #84b736;">{{ $order->status }}</p
                            class="py-1 px-2 rounded text-white" style="background-color: #84b736;">
                        </li>
                      </ul>
  
                    </div>
  
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
