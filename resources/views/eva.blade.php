<!doctype html>
<html lang="en">
<head>
    <title>Halaman Form</title>
    @include('layouts.head')
</head>
<body>
    @include('components.navbar')
    <div class="container p-5 pt-3 pb-3 w-50 mb-5 rounded-3 bg-dark">
        @auth
        <div class="row text-center text-primary mb-3">
            <h3>Form Belajar Web Programming</h3>
        </div>
        <div class="row">
            <form method="POST" action="/eva">
                @csrf
                <div class="mb-3">
                    <label for="input-name" class="form-label">Nama Lengkap :</label>
                    <input
                            type="text"
                            class="form-control"
                            id="input-name"
                            name="fullname"
                            value="{{old('fullname')}}"
                    >
                    @error('fullname')
                        <small class="text-danger mt-2">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="input-email" class="form-label">Email :</label>
                    <div class="m-0 input-group">
                        <input
                            type="email"
                            class="form-control"
                            id="input-email"
                            name="email"
                            value="{{old('email')}}"
                            autocomplete="off"
                        >
                        <span class="input-group-text" id="basic-addon2">@example.com</span>
                    </div>
                @error('email')
                    <small class="text-danger mt-2">{{ $message }}</small>
                @enderror
                </div>

                <div class="mb-3">
                    <label for="input-name" class="form-label">Pilih Bahasa Pemrograman Web :</label>
                    <div class="input-group">
                        <div class="one me-3">
                            <div class="form-check ms-2">
                                <input type="checkbox" class="form-check-input" name="sources[]" value="PHP" id="checkbox-php"/>
                                <label for="checkbox-PHP" class="form-check-label">PHP</label>
                            </div>
                            <div class="form-check ms-2">
                                <input type="checkbox" class="form-check-input" name="sources[]" value="Javascript" id="checkbox-javascript"/>
                                <label for="checkbox-javascript" class="form-check-label">Javascript</label>
                            </div>
                            <div class="form-check ms-2">
                                <input type="checkbox" class="form-check-input" name="sources[]" value="Python" id="radio-python"/>
                                <label for="radio-python" class="form-check-label">Python</label>
                            </div>            
                            <div class="form-check ms-2">
                                <input type="checkbox" class="form-check-input" name="sources[]" value="Java" id="checkbox-java"/>
                                <label for="checkbox-java" class="form-check-label">Java</label>
                            </div>
                        </div>
                        <div class="two me-3">
                            <div class="form-check ms-2">
                                <input type="checkbox" class="form-check-input" name="sources[]" value="Swift" id="radio-swift"/>
                                <label for="radio-swift" class="form-check-label">Swift</label>
                            </div>            
                            <div class="form-check ms-2">
                                <input type="checkbox" class="form-check-input" name="sources[]" value="Ruby" id="checkbox-ruby"/>
                                <label for="checkbox-ruby" class="form-check-label">Ruby</label>
                            </div>
                            <div class="form-check ms-2">
                                <input type="checkbox" class="form-check-input" name="sources[]" value="Matlab" id="radio-matlab"/>
                                <label for="radio-matlab" class="form-check-label">Matlab</label>
                            </div>
                        </div>
                    </div>
                    @error('sources')
                        <small class="text-danger mt-2">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="d-grid gap-2 mt-5 mb-3">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
        @endauth
    </div>
</body>
</html>
