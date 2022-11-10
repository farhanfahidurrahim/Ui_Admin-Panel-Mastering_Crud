@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Category') }}</div>

                <div class="card-body">
                    <a href="{{ route('category.index') }}" class="btn btn-info" style="float: right;">All Category</a>
                    <br>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('category.store') }}">
                    	@csrf

                    	<div class="form-group">
                    		<label>Category Name</label>
                    		<input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" placeholder="Category Name">
                    		<small class="form-text tex-muted">Write a category name...</small>

                    		@error('category_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                    	</div>

                    	{{-- <div class="form-group">
                    		<label>Category Slug</label>
                    		<input type="text" name="category_slug" class="form-control" placeholder="Category Slug" required>
                    	</div> --}}
                    	<button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
