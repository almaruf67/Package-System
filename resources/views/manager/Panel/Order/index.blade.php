@extends('manager.layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <!-- Product List -->
            <div class="col-md-7 pr-3">
                <div class="row mb-2 pt-2">

                    <div class="col-sm-12 d-flex justify-content-between align-items-center">
                        <h2 class="text-center">Product List</h2>

                        <!-- Cart Button (visible on smaller screens) -->
                        <!-- Cart Button (visible on smaller screens) -->
                        <a class="d-md-none" data-toggle="modal" data-target="#cartModal">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span
                                class="badge bg-danger">{{ count((array) session('cart')) }}</span>
                        </a>

                        <!-- Cart Pop-Out Modal -->
                        <div class="modal fade" id="cartModal" tabindex="-1" role="dialog"
                            aria-labelledby="cartModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="cartModalLabel">Cart</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body bg-secondary">
                                        <!-- Your cart content goes here -->
                                        <ul class="list-group" id="cart">
                                            @php $total = 0 @endphp
                                            @if (session('cart'))
                                                @foreach (session('cart') as $id => $details)
                                                    <li
                                                        class="d-flex align-items-center position-relative border-top py-2 border-light">
                                                        <div class="px-3">
                                                            <h5>{{ $loop->iteration }}.</h5>
                                                        </div>
                                                        <div class="p-img light-bg">
                                                            <img src="{{ asset($details['poster']) }}" alt="Product Image"
                                                                width="75px">
                                                        </div>
                                                        <div class="p-data">
                                                            <h3 class="font-semi-bold">{{ $details['title'] }}</h3>
                                                            @php $sum =$details['quantity'] * $details['price']  @endphp
                                                            <p class="theme-clr font-semi-bold"
                                                                data-id="{{ $id }}"><input type="number"
                                                                    value="{{ $details['quantity'] }}"
                                                                    class="quantity cart_update col-3 bg-transparent text-white"
                                                                    min="1" />
                                                                x {{ $details['price'] }} ৳ ={{ $sum }}৳</p>
                                                            @php $total +=$sum  @endphp
                                                        </div>
                                                        <div rowdel="{{ $id }}" class="p-data">
                                                            <p><a
                                                                    class="btn btn-outline-danger delete-product bottom-50 end-0"><i
                                                                        class="fas fa-trash-alt"></i></a></p>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif
                                            <li class="d-flex justify-content-between border-top p-2 border-light">
                                                <div class="pl-3"><span class="">Total Price: &nbsp;</span><strong>{{ $total }} ৳</strong></div>
                                                <a href="#" class="btn btn-dark">Place Order</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="row pt-3">
                    <div class="container">
                        <div class="row">
                            @foreach ($products as $item)
                                <div class="col-xl-3 col-md-4 col-sm-6 col-6">
                                    <a href="{{ route('addcart', $item->id) }}" @style('text-decoration:none')>
                                        <div class="">
                                            <h4 class="">{{ $item->Title }}</h4>
                                            <div class="">
                                                <img alt="" src="{{ asset($item->Poster) }}" width="120px"
                                                    height="80px">
                                            </div>
                                            <p><span>$</span>{{ $item->Price }}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            <br>
                            <div class="d-flex justify-content-center m-auto mt-5 ">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cart -->
            <div class="col-md-5 p-2 bg-secondary rounded d-none d-md-block">
             
                <!-- Cart Section (visible on larger screens) -->

                <div class="col-sm-12">
                    <h2 class="text-center">Cart</h2>
                </div>
                <ul class="list-group" id="cart">
                    @php $total = 0 @endphp
                    
                    @if (session('cart'))
                        @foreach (session('cart') as $id => $details)
                            <li class="d-flex align-items-center position-relative border-top py-2 border-light">
                                <div class="px-3">
                                    <h5>{{ $loop->iteration }}.</h5>
                                </div>
                                <div class="p-img light-bg">
                                    <img src="{{ asset($details['poster']) }}" alt="Product Image" width="75px">
                                </div>
                                <div class="p-data">
                                    <h3 class="font-semi-bold">{{ $details['title'] }}</h3>
                                    @php $sum =$details['quantity'] * $details['price']  @endphp
                                    <p class="theme-clr font-semi-bold" data-id="{{ $id }}"><input type="number"
                                            value="{{ $details['quantity'] }}"
                                            class="quantity cart_update col-3 bg-transparent text-white" min="1" />
                                        x {{ $details['price'] }} ৳ ={{ $sum }}৳</p>
                                    @php $total +=$sum  @endphp
                                </div>
                                <div rowdel="{{ $id }}" class="p-data">
                                    <p><a class="btn btn-outline-danger delete-product bottom-50 end-0"><i
                                                class="fas fa-trash-alt"></i></a></p>
                                </div>
                            </li>
                        @endforeach
                    @endif
                
                    <li class="d-flex justify-content-between border-top p-2 border-light">
                        <div class="pl-3"><span class="">Total Price: &nbsp;</span><strong
                                style="color:#fff;">{{ $total }} ৳</strong></div>
                        <a href="#" class="btn btn-dark">Place Order</a>
                    </li>
                </ul>

            </div>

        </div>


    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#sortable-table').DataTable({
                paging: true, // Enable pagination
                // pageLength: 100,     // Set the number of rows per page to 100
                lengthChange: true, // Disable entries per page dropdown
                searching: true, // Disable search box
                // info: false     // Disable table information
            });
        });
    </script>
    <script type="text/javascript">
        $(".delete-product").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Do you really want to delete?")) {
                $.ajax({
                    url: '{{ route('delete.cart.product') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("div").attr("rowdel")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
    <script type="text/javascript">
        $(".cart_update").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update_cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("p").attr("data-id"),
                    quantity: ele.parents("p").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });
    </script>
@endsection
