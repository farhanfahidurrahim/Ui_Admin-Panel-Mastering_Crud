@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Sub-Category') }}</div>

                <div class="card-body">
                    <a href="{{ route('subcategory.index') }}" class="btn btn-info" style="float: right;">All Sub-Category</a>
                    <br>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('subcategory.store') }}">
                    	@csrf

                    	<div class="form-group">
                    		<label>Select Category Name</label>
                    		<select class="form-control" name="category_id">
                    			@foreach($cat as $row)
                    				<option value="{{$row->id}}">{{$row->category_name}}</option>
                    			@endforeach
                    		</select>
                    	</div>
                    	<div class="form-group">
                    		<label>Sub-Category Name</label>
                    		<input type="text" name="subcategory_name" class="form-control @error('subcategory_name') is-invalid @enderror" placeholder="Sub-Category Name">
                    		<small class="form-text tex-muted">Write a sub-category name...</small>

                    		@error('subcategory_name')
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
