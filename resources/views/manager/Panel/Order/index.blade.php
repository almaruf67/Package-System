@extends('manager.layouts.app')
@section('content')
    <main class="page-content">

        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="col-sm-12 d-flex justify-content-between align-items-center">
                        <h5 class="mb-3 border-bottom pb-3">Product List</h5>

                        <!-- Cart Button (visible on smaller screens) -->
                        <button id="showCartModal" class="btn d-md-none" data-toggle="modal" data-target="#cartModal">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span
                                class="badge bg-danger">{{ count((array) session('cart')) }}</span>
                        </button>


                        <!-- Cart Pop-Out Modal -->
                        <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Cart</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                        <!-- Your cart content goes here -->
                                        <table id="shoppingCart" class="table table-condensed table-responsive">
                                            <thead>
                                                <tr>
                                                    <th style="width: 50%">Product</th>
                                                    <th style="width: 12%">Price</th>
                                                    <th style="width: 10%">Quantity</th>
                                                    <th style="width: 12%">Sub</th>
                                                    <th style="width: 16%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $total = 0 @endphp
                                                @foreach (session('cart') as $id => $details)
                                                    <tr>
                                                        <td data-th="Product">
                                                            <div class="row">
                                                                <div class="col-md-9 text-left">
                                                                    <h6>{{ $details['title'] }}</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="price" data-th="Price"><span>{{ $details['price'] }}</span></td>
            
                                                        <td data-id="{{ $id }}">
                                                            <input type="number"
                                                                class="form-control form-control-sm text-center cart_update quantity"
                                                                min="1" value="{{ $details['quantity'] }}" />
                                                        </td>
                                                        @php $sum =$details['quantity'] * $details['price']  @endphp
                                                        <td class="price" data-th="Sub"><span>{{ $sum }}</span></td>
            
                                                        @php $total +=$sum  @endphp
                                                        <td class="actions">
                                                            <div rowdel="{{ $id }}" class="p-data">
                                                                <button
                                                                    class="btn btn-white border-secondary bg-white btn-md delete-product">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="row mt-4 d-flex justify-content-end align-items-center">
                                            <div class="col-6 d-flex align-items-center">
                                                <h5>Total:</h5>
                                                <h5 class="px-3">
                                                    <i class="fas fa-bangladeshi-taka-sign"></i>{{ $total }}
                                                </h5>
                                            </div>
                                            <div class="col-6 col-sm-6 order-md-2 text-right pt-3">
                                                <a href="#" class="btn btn-primary mb-4 btn-md pl-3 pr-3">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        @foreach ($products as $item)
                            <!-- Product Cards -->
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                                <div class="product-card px-3 py-3">
                                    <!-- Product Image -->
                                    <div class="w-100 d-flex justify-content-center">
                                        <img src="{{ asset($item->Poster) }}" alt="" class="img-fluid" />
                                    </div>

                                    <!-- Product Name -->
                                    <h6 class="mt-2">{{ $item->Title }}</h6>
                                    <!-- Rating and Review Count -->
                                    <div class="d-flex flex-column">
                                        <!-- Product Price -->
                                        <div class="d-flex gap-1">
                                            <i class="fas fa-bangladeshi-taka-sign"></i>
                                            <h6>{{ $item->Price }}</h6>
                                        </div>
                                        <!-- Quantity Input and Add to Cart Button -->
                                        <div>
                                            <a href="{{ route('addcart', $item->id) }}" class="btn btn-primary">
                                                <i class="fa-solid fa-bag-shopping"></i>Add
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Repeat the above product card for additional products -->
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-5 d-none d-md-block">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-end border-bottom pb-2 mb-3">
                            <h5>Cart</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12 cart">
                            <table id="shoppingCart" class="table table-condensed table-responsive">
                                <thead>
                                    <tr>
                                        <th style="width: 50%">Product</th>
                                        <th style="width: 12%">Price</th>
                                        <th style="width: 10%">Quantity</th>
                                        <th style="width: 12%">Sub</th>
                                        <th style="width: 16%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total = 0 @endphp
                                    @foreach (session('cart') as $id => $details)
                                        <tr>
                                            <td data-th="Product">
                                                <div class="row">
                                                    <div class="col-md-3 text-left">
                                                        <img src="{{ asset($details['poster']) }}" alt=""
                                                            class="img-fluid d-none d-md-block rounded mb-2 shadow" />
                                                    </div>
                                                    <div class="col-md-9 text-left">
                                                        <h6>{{ $details['title'] }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="price" data-th="Price"><span>{{ $details['price'] }}</span></td>

                                            <td data-id="{{ $id }}">
                                                <input type="number"
                                                    class="form-control form-control-sm text-center cart_update quantity"
                                                    min="1" value="{{ $details['quantity'] }}" />
                                            </td>
                                            @php $sum =$details['quantity'] * $details['price']  @endphp
                                            <td class="price" data-th="Sub"><span>{{ $sum }}</span></td>

                                            @php $total +=$sum  @endphp
                                            <td class="actions">
                                                <div rowdel="{{ $id }}" class="p-data">
                                                    <button
                                                        class="btn btn-white border-secondary bg-white btn-md delete-product">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row mt-4 d-flex justify-content-end align-items-center">
                                <div class="col-6 d-flex align-items-center">
                                    <h5>Total:</h5>
                                    <h5 class="px-3">
                                        <i class="fas fa-bangladeshi-taka-sign"></i>{{ $total }}
                                    </h5>
                                </div>
                                <div class="col-6 col-sm-6 order-md-2 text-right pt-3">
                                    <a href="#" class="btn btn-primary mb-4 btn-md pl-3 pr-3">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
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
                    id: ele.parents("td").attr("data-id"),
                    quantity: ele.parents("td").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });
    </script>
    <script>
        // Wait for the document to be ready
        $(document).ready(function() {
            // Handle click event for the button with id "showCartModal"
            $("#showCartModal").click(function() {
                // Toggle the modal by targeting its data-target
                $($(this).data("target")).modal("toggle");
            });
        });
    </script>
@endsection
