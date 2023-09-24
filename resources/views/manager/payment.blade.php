@extends('layouts.app')
@section('content')


    <div class="container">
        <form>
            @csrf
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    

                    <h3 class="pb-3">Billing details</h3>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                                value="{{ auth()->user()->name }}" disabled />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email"
                                value="{{ auth()->user()->email }}" disabled />
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <input type="text" class="form-control" id="type" name="type"
                                value="{{ $Plan['name'] }}" disabled />
                    </div>
                    <div class="mb-3">
                        <label for="month" class="form-label">Selected Month</label>
                        <input type="int" class="form-control" id="month" name="month"
                                value="{{ $info['month'] }}" disabled />
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Total Price</label>
                        <input type="int" class="form-control" id="price" name="price"
                                value="{{ $Plan['price']*$info['month'] }}" disabled />
                    </div>
                    <div class="mt-5 mb-3 d-flex flex-column flex-md-row justify-content-between">
                        <div class="mb-4 mb-md-0"><a href="{{ route('home') }}" class="btn btn-danger">Back</a></div>
                        <div> <button class="button" id="sslczPayBtn" token="if you have any token validation"
                            postdata="your javascript arrays or objects which requires in backend"
                            order="If you already have the transaction generated for current order"
                            endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
                        </button></div>
                       
                    </div>
                    
                </div>

            </div>
        </form>
    </div>

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var obj = {};
        obj.name = $('#name').val();
        obj.email = $('#email').val();
        obj.type = $('#type').val();
        obj.price = $('#price').val();

        //   obj.total = {{ session()->get('total') }};

        $('#sslczPayBtn').prop('postdata', obj);

        (function(window, document) {
            var loader = function() {
                var script = document.createElement("script"),
                    tag = document.getElementsByTagName("script")[0];
                // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(
                    7); // USE THIS FOR SANDBOX
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload",
                loader);
        })(window, document);
    </script>
@endsection
@endsection
