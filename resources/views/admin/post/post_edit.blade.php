@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- general form elements -->
             <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Post</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('post.update',$post->id) }}" enctype="multipart/form-data">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Post Title</label>
                    <input type="text" name="title" class="form-control" value="{{$post->title}}" required>
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
                    				<option value="{{$row->id}}" @if($row->id==$post->subcategory_id) selected @endif>---{{$row->subcategory_name}}</option>
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
                    <input type="date" name="post_date" class="form-control" value="{{$post->post_date}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tags</label>
                    <input type="text" name="tags" class="form-control" value="{{$post->tags}}" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea class="form-control summernote" name="description" rows="3">{{$post->description}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <input type="hidden" name="old_image" value="{{$post->image}}">
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" @if($post->status==1) checked @endif name="status" value="1">
                    <label class="form-check-label" for="exampleCheck1">Publish Now!</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

        </div>
    </div>
</div>

@endsection














		



