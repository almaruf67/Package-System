@extends('layouts.app')
@section('link')
    <link rel="stylesheet" href="{{ asset('asset/style.css') }}">
@endsection
@section('content')
    <section>
        <div class="container">

            <div class="row">
                <h1 class="text-center">Our Plans</h1>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <form class="card-wrapper" action="{{ route('payment') }}" method="post">
                        @csrf
                        <div class="card light">
                            <div class="text-overlay">
                                <h3>Starter</h3>
                                <input type="hidden" name="type" value="Starter">
                                <div class="price">300.00৳<small> / month</small></div>
                                <div class="details-text">
                                    <span>1 contributor</span>
                                    <span>1 month = 300৳</span>
                                    <input type="hidden" name="price" value="300">
                                    <span>24/7 support</span>
                                </div>
                            </div>
                            <div class="purchase-button-container2">
                                <h2 class="back-h2">1 Months</h2>
                                <i class="fa-solid fas fa-cart-arrow-down"></i>
                                <button type="submit" class="purchase-button dark">Purchase</button>
                            </div>
                        </div>

                    </form>
                </div>
            
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <form class="card-wrapper" action="{{ route('payment') }}" method="post">
                        @csrf
                        <div class="card dark">
                            <div class="text-overlay">
                                <h3>Business</h3>
                                <input type="hidden" name="type" value="Business">
                                <div class="price">266.67৳<small> / month</small></div>
                                <div class="details-text">
                                    <span>1 contributor</span>
                                    <span>3 month = 800৳</span>
                                    <input type="hidden" name="price" value="300">
                                    <span>24/7 support</span>
                                </div>
                            </div>
                            <div class="purchase-button-container2">
                                <h2 class="back-h2">3 Months</h2>
                                <i class="fa-solid fas fa-cart-arrow-down"></i>
                                <button type="submit" class="purchase-button dark">Purchase</button>
                            </div>
                        </div>

                    </form>
                </div>
            
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <form class="card-wrapper" action="{{ route('payment') }}" method="post">
                        @csrf
                        <div class="card light">
                            <div class="text-overlay">
                                <h3>Professional</h3>
                                <input type="hidden" name="type" value="Professional">
                                <div class="price">250.00৳<small> / month</small></div>
                                <div class="details-text">
                                    <span>1 contributor</span>
                                    <span>6 month = 1500৳</span>
                                    <input type="hidden" name="price" value="300">
                                    <span>24/7 support</span>
                                </div>
                            </div>
                            <div class="purchase-button-container2">
                                <h2 class="back-h2">6 Months</h2>
                                <i class="fa-solid fas fa-cart-arrow-down"></i>
                                <button type="submit" class="purchase-button dark">Purchase</button>
                            </div>
                        </div>

                    </form>
                </div>
            
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <form class="card-wrapper" action="{{ route('payment') }}" method="post">
                        @csrf
                        <div class="card dark">
                            <div class="text-overlay">
                                <h3>Premium</h3>
                                <input type="hidden" name="type" value="Premium">
                                <div class="price">225.00৳<small> / month</small></div>
                                <div class="details-text">
                                    <span>1 contributor</span>
                                    <span>12 month = 2700৳</span>
                                    <input type="hidden" name="price" value="300">
                                    <span>24/7 support</span>
                                </div>
                            </div>
                            <div class="purchase-button-container2">
                                <h2 class="back-h2">1 Year</h2>
                                <i class="fa-solid fas fa-cart-arrow-down"></i>
                                <button type="submit" class="purchase-button dark">Purchase</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{ asset('asset/app.js') }}"></script>
@endsection
