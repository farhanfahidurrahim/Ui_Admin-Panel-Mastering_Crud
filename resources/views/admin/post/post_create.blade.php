@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- general form elements -->
             <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Post</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Post Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Title" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Category</label>
                    <select name="subcategory_id" class="form-control">
                    	<option disabled selected>Select Category</option>
                    	@foreach($cat as $row)
                    		@php
                    			$subcat=DB::table('subcategories')->where('category_id',$row->id)->get();
                    		@endphp
                    		<option disabled class="text-danger">{{$row->category_name}}</option>
                    			@foreach($subcat as $row)
                    				<option value="{{$row->id}}">---{{$row->subcategory_name}}</option>
                    			@endforeach
                    	@endforeach
                    </select>
                  </div>
                  {{-- <div class="form-group">
                    <label for="exampleInputEmail1">SubCategory</label>
                    <select name="subcategory_name" class="form-control">
                    	<option disabled selected>Select Subcategory</option>
                    	@foreach($subcat as $row)
                    		<option>{{$row->subcategory_name}}</option>
                    	@endforeach
                    </select>
                  </div> --}}
                  <div class="form-group">
                    <label for="exampleInputEmail1">Post Date</label>
                    <input type="date" name="post_date" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tags</label>
                    <input type="text" name="tags" class="form-control" placeholder="Enter Title" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea class="form-control summernote" name="description" rows="3"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="status" value="1">
                    <label class="form-check-label" for="exampleCheck1">Publish Now!</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

        </div>
    </div>
</div>

@endsection














		



