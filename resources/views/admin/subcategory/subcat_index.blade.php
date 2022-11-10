@extends('layouts.app')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sub-Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Sub-Category Table</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Sub-Category</h3>
                <a href="{{ route('subcategory.create') }}" class="btn btn-primary btn-sm" style="float:right;">Add Sub-Category</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Category Name</th>
                    <th>Sub-Category Name</th>
                    <th>Sub-Category Slug</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($subcat as $key=>$row)
                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{$row->category_name}}</td>
                      <td>{{$row->subcategory_name}}</td>
                      <td>{{$row->subcategory_slug}}</td>
                      <td>
                          <a href="{{ route('subcategory.edit',$row->id) }}" class="btn btn-info btn-sm">Edit</a>
{{--                           <a href="{{ route('subcategory.destroy',$row->id) }}" class="btn btn-danger btn-sm delete">Delete</a>
 --}}                      </td>
                      <td>
                        <form method="POST" action="{{ route('subcategory.destroy',$row->id) }}">
                          @csrf
                          <input type="hidden" name="_method" value="DELETE" class="delete">
                          <button type="submit" href="" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>


{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Category') }}</div>

                <div class="card-body">
                    <a href="{{ route('category.create') }}" class="btn btn-info" style="float: right;">Add Category</a>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-responsive">
                    	<thead>
                    		<tr>
                    			<th>SL.</th>
                    			<th>Name</th>
                    			<th>Slug</th>
                    			<th>Action</th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    	@foreach($cat as $key=>$row)	
                    		<tr>
                    			<td>{{++$key}}</td>
                    			<td>{{$row->category_name}}</td>
                    			<td>{{$row->category_slug}}</td>
                    			<td>
                    				<a href="{{ route('category.edit',$row->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    				<a href="{{ route('category.destroy',$row->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    			</td>
                    		</tr>
                    	</tbody>
                    	@endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div> --}}

@endsection
