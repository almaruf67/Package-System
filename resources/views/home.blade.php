@extends('layouts.app')
@section('link')
    <link rel="stylesheet" href="{{ asset('asset/style.css') }}">
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <h1 class="text-center">Our Plans</h1>
                @foreach ($plans as $plan)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <form class="card-wrapper" action="{{ route('payment') }}" method="post">
                            @csrf
                            @if ($loop->iteration%2==0)
                                   <div class="card dark">
                                @else
                                <div class="card light">
                                @endif
                           
                                <div class="text-overlay">
                                    <h3>{{ $plan['name'] }}</h3>
                                    <input type="number" class="d-none" id="price{{ $loop->iteration }}" value="{{ $plan['price'] }}">
                                    <div class="price">{{ $plan['price'] }}৳<small> / month</small></div>
                                    <div class="details-text">
                                        <span>{{ $plan['contributors'] }} Contributors</span>
                                        <span>{{ $plan['details'] }}</span>
                                        <span>24/7 support</span>
                                    </div>
                                </div>
                                <div class="purchase-button-container2">
                                    <h5 class="back-h2">
                                        ৳<input type="number" class="col-4" id="u_price{{ $loop->iteration }}" name="price" value="{{ $plan['price'] }}" readonly>
                                        /<input type="number" name="month" class="col-3" id="month{{ $loop->iteration }}" value="1" min="1" onchange="updateTotal(this,{{ $loop->iteration }})">
                                        Months
                                    </h5>
                                    <i class="fa-solid fas fa-cart-arrow-down"></i>
                                    <button type="submit" class="purchase-button dark">Purchase</button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section('scripts')
<script src="{{ asset('asset/app.js') }}"></script>
<script>
    // Function to update the total price based on the selected number of months
    function updateTotal(input, cardIndex) {
        // Get the selected number of months
        const selectedMonths = parseInt(input.value);

        // Get the initial price from the price input of the specific card
        const initialPrice = parseInt(document.querySelector(`#price${cardIndex}`).value);

        // Calculate the total price
        const totalPrice = selectedMonths * initialPrice;

        // Update the displayed total price for the specific card
        document.querySelector(`#u_price${cardIndex}`).value = totalPrice; // Format to two decimal places
    }
</script>
@endsection
