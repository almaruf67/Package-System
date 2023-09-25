@extends('admin.layouts.app')

@section('content')
<main class="page-content">
    <div class="container pb-5">

        <div class="row mb-5 pt-2">
            <div class="col-sm-12">
                <h2 class="text-center">Update Plan Info.</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2">
                <a href="{{ route('plans.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <form action="{{ route('plans.update', $plan->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name *</label>
                        <input value="{{$plan->name }}" type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price *</label>
                        <input value="{{$plan->price }}" type="int" class="form-control" name="price" id="price" aria-describedby="emailHelp" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="contributors" class="form-label">Contibutors *</label>
                        <input value="{{$plan->contributors }}" type="int" class="form-control" name="contributors" id="contributors" aria-describedby="emailHelp" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="details" class="form-label">Details *</label>
                        <input value="{{$plan->details }}" type="details" class="form-control" name="details" id="details" aria-describedby="emailHelp" required autofocus>
                    </div>
                    

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
