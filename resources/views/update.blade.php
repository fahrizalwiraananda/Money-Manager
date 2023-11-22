<!doctype html>
<html lang="en">
<head>
    @include('layouts.head')
    <title>Update Activity</title>
</head>
<body>
@include('components.navbar')
<div class="container">
    <div class="row mt-5 justify-content-center">

        <h3 class="text-center mb-5 text-or fw-bold">Update Data</h3>

        <div class="col-12 col-md-4">
            <form method="POST" action="">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="input-description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="input-description" name="description" value="{{ $description }}">
                    @error('nominal')
                    <small class="text-danger mt-2">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="input-nominal" class="form-label">Nominal</label>
                    <input type="number" class="form-control" id="input-nominal" name="nominal" value="{{ $nominal }}">
                    @error('nominal')
                    <small class="text-danger mt-2">{{ $message }}</small>
                    @enderror
                </div>
                <div>
                    <button class="btn btn-orange w-100">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>