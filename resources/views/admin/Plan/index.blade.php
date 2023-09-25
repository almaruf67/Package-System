@extends('admin.layouts.app')
@section('content')
<main class="page-content">
    <div class="container">

        <div class="row mb-2 pt-2">
            <div class="col-sm-12">
                <h2 class="text-center">Manage All User Information</h2>
            </div>
        </div>
        <!-- Create Button -->
        <div class="row">
            <div class="col-8">
                <a href="{{ route('plans.create') }}" class="btn btn-primary">Add New Plans</a>
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table display" id="sortable-table">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Contibutors</th>
                                    <th>Details</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        <tbody>
                        @foreach($plans as $plan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $plan->name }}</td>
                                <td>{{ $plan->price }}</td>
                                <td>{{ $plan->contributors }}</td>
                                <td>{{ $plan->details }}</td>
                                <td >
                                     
                                    <form action="{{ route('plans.destroy', $plan->id) }}" method="post" style="display: inline-block;">
                                        @method("DELETE")
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a href="{{ route('plans.edit', $plan->id) }}" class="btn btn-primary">Edit</a>
                                
                                   
                                    
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


