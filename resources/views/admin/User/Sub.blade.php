@extends('admin.layouts.app')
@section('content')
    <main class="page-content">
        <div class="container">

            <div class="row mb-2 pt-2">
                <div class="col-sm-12">
                    <h2 class="text-center">Manage All Plans Information</h2>
                </div>
            </div>
            <!-- Create Button -->

            <div class="row pt-3">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table display" id="sortable-table">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Expire Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($plans as $plan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        @foreach ($plan->users as $user)
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                        @endforeach
                                        <td>{{ $plan->type }}</td>
                                        @if ($plan->status)
                                            <td>Active</td>
                                        @else
                                            <td>Deactive</td>
                                        @endif
                                        <td>{{ \Carbon\Carbon::parse($plan->expiry_date)->format('Y-m-d') }}</td>
                                        <td>


                                            <form action="{{ route('user.destroy', $plan->id) }}" method="post"
                                                style="display: inline-block;">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                            <a href="#" id="exampleModal" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>



                                            <!-- Modal -->
                                            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="editModalLabel">Edit Subscription Status</h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                            <form method="POST" action="{{ route('Subupdate') }}">
                                                                @csrf
                                                                @method('PATCH')
                                                                <input type="hidden" name="id"
                                                                    value="{{ $plan->id }}">

                                                                <div class="form-group">
                                                                    <select name="status" id="status"
                                                                        class="form-control">
                                                                        <option value="1"
                                                                            {{ $plan->status == '1' ? 'selected' : '' }}>
                                                                            Active</option>
                                                                        <option value="0"
                                                                            {{ $plan->status == '0' ? 'selected' : '' }}>
                                                                            Deactive</option>
                                                                    </select>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $plans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script>
            <script>
        $(document).ready(function() {
            $('.delete-item').click(function() {
                var itemId = $(this).data('id');

                $.ajax({
                    url: '/admin/delete/' + itemId,
                    type: 'get',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Update the UI, e.g., remove the deleted item from the table
                        $('#item-' + itemId).remove();
                        window.location.reload();
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
    </script>
@endsection
