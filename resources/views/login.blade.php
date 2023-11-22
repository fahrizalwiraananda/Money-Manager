<!doctype html>
<html lang="en">
<head>
    @include('layouts.head')
    <title>Login</title>
</head>
<body>
@include('components.navbar')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 col-xl-4">
            <h1 class="text-center text-or">Login</h1>
            <form action="/login" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="input-email" class="form-label" >Email</label>
                    <input type="email" class="form-control" id="input-email" name="email" value="{{ old('name') }}"/>
                    @error('email')
                        <small class="text-danger mt-2">{{ $message }}</small>
                    @enderror
                </div>
            
                <div class="mb-4">
                    <label for="input-password" class="form-label" >Password</label>
                    <input type="password" class="form-control" id="input-password" name="password" />
                    @error('password')
                    <small class="text-danger mt-2">{{ $message }}</small>
                    @enderror
                </div>
                <div>
                    <button class="btn w-100 btn-orange"  type="submit">Login</button>
                </div>
                @error('auth')
                <small class="text-danger mt-2">{{ $message }}</small>
                @enderror
            </form>
        </div>
    </div>
</div>
</body>
</html>