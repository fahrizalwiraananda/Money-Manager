<!doctype html>
<html lang="en">
<head>
    @include('layouts.head')
    <title>Register</title>
</head>
<body>
@include('components.navbar')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-4">
            <h1 class="text-center text-or">Register</h1>
            <form action="/register" method="POST">
            @csrf
                <div class="mb-4">
                    <label for="input-name" class="form-label" >Name</label>
                    <input type="text" class="form-control " id="input-name" name="name" value="{{ old('name') }}"/>
                    @error('name')
                        <small class="text-danger mt-2">{{ $message }}</small>
                    @enderror  
                </div>
                <div class="mb-4">
                    <label for="input-email" class="form-label" >Email</label>
                    <input type="email" class="form-control" id="input-email" name="email" value="{{ old('email') }}"/>
                    @error('email')
                        <small class="text-danger mt-2">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="input-password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="input-password" name="password"/>
                    @error('password')
                        <small class="text-danger mt-2">{{ $message }}</small>
                    @enderror
                </div>
                <div>
                    <button class="btn w-100 btn-orange" type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
