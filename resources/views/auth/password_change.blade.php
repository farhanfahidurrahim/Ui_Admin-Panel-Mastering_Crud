@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Password Change') }}</div>

                <div class="card-body">

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    {{-- <form method="POST" action="{{ route('password.update') }}">
                    	@csrf
                    	<div>
                    		<label>Current Password</label>
                    		<input type="password" name="current_password" class="form-control" placeholder="Type Current Password" required>
                    	</div>
                    	<div>
                    		<label>New Password</label>
                    		<input type="password" name="password" class="form-control @error('password') is invalid @enderror" placeholder="Type New Password" required>
                    		@error('password')
				                <span class="invalid-feedback" role="alert">
				                    <strong>{{ $message }}</strong>
				                </span>
				            @enderror
                    	</div>
                    	<div>
                    		<label>Confirm Pasword</label>
                    		<input type="password" name="password_confirmation" class="form-control" placeholder="Type Confirm Password" required>
                    	</div>
                    	<br>
                    	<button type="submit" class="btn btn-primary">Password Change</button>
                    </form> --}}




                    <form method="POST" action="{{ route('password.update') }}">
                    	@csrf
                    	<div>
                    		<label>Current Password:</label>
                    		<input type="password" name="current_password" class="form-control" placeholder="Type Current Password" required>
                    	</div>
                    	<div>
                    		<label>New Password:</label>
                    		<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Type New Password" required>
                    		@error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    	</div>
                    	<div>
                    		<label>Confirm Password:</label>
                    		<input type="password" name="password_confirmation" class="form-control" placeholder="Re-Type New Password" required>
                    	</div>
                    		<br>
                    	<button type="submit" class="btn btn-success">Password Change</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
