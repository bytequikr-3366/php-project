@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <h3 class="mb-4 text-center">Create Account</h3>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="m-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('signup.post') }}" method="POST">
                @csrf               

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button class="btn btn-primary w-100">Sign Up</button>
            </form>

        </div>
    </div>
</div>

@endsection
