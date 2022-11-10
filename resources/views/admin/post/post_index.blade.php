@extends('layouts.app')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Category Table</li>
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
                <h3 class="card-title">All Categories</h3>
                <a href="{{ route('post.create') }}" class="btn btn-primary btn-sm" style="float:right;">Create new Post</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Category </th>
                    <th>SubCategory</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Post Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($post as $key=>$row)
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$row->category_name}}</td>
                    <td>{{$row->subcategory_name}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->title}}</td>
                    <td>{{$row->image}}</td>
                    <td>{{ date('d F, Y', strtotime($row->post_date)) }}</td>
                    <td>
                      @if($row->status==1)
                        <span class="badge badge-success">Active</span>
                      @else
                        <span class="badge badge-danger">Inactive</span>
                      @endif
                    </td>
                    <td>
                        <a href="{{ route('post.edit',$row->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('post.delete',$row->id) }}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></a>
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

@endsection
