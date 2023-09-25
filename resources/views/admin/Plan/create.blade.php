@extends('admin.layouts.app')

@section('content')
    <main class="page-content">
        <div class="container">

            <div class="row mb-2 pt-2">
                <div class="col-sm-12">
                    <h2 class="text-center">Add New Plans</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-8 offset-2">
                    <a href="{{ route('plans.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
            <div class="row">
                <div class="col-8 offset-2">
                    <form action="{{ route('plans.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name *</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" required autofocus>
                        </div>
    
                        <div class="mb-3">
                            <label for="price" class="form-label">Price *</label>
                            <input type="int" class="form-control" name="price" id="price" aria-describedby="emailHelp" required autofocus>
                        </div>
    
                        <div class="mb-3">
                            <label for="contributors" class="form-label">Contibutors *</label>
                            <input type="int" class="form-control" name="contributors" id="contributors" aria-describedby="emailHelp" required autofocus>
                        </div>
    
                        <div class="mb-3">
                            <label for="details" class="form-label">Details *</label>
                            <input type="details" class="form-control" name="details" id="details" aria-describedby="emailHelp" required autofocus>
                        </div>
                        
    
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
