@extends('components.layout')

@section('content')
    <div class="container mt-4">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-6 offset-lg-4 offset-md-3">
                <form method="POST" action="/login" class="p-4 rounded-4 shadow-lg">
                    @csrf
                    <h1 class="display-5 mb-3">Login</h1>
                    <div class="">
                        <label for="exampleInputEmail1" class="form-label">E-Mail-Adresse</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="email" value="{{ old('email') }}">
                        <small class="form-text text-danger no-error @error('email') error @enderror"><i
                                class="fa-solid fa-circle-exclamation"></i> @error('email')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                            value="{{ old('password') }}">


                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-lock-open"></i>
                        Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection
