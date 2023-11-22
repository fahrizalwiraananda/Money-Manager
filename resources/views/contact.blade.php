<!doctype html>
<html lang="en">
<head>
    @include('layouts.head')
    <title>Hubungi Kami</title>
</head>
<body>
@include('components.navbar')
<div class="container">
  <div class="row">
    <h1>Hubungi Kami</h1>
  </div>
  <div class="row">
    <div class="col-4">
      <form method="POST" action="/contact">
        @csrf
        <div class="mb-3">
          <label for="input-name" class="form-label">Nama Lengkap</label>
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
          <label for="input-email" class="form-label">Email</label>
          <input
            type="email"
            class="form-control"
            id="input-email"
            name="email"
            value="{{old('email')}}"
            autocomplete="off"
          >
          @error('email')
            <small class="text-danger mt-2">{{ $message }}</small>
          @enderror
        </div>
        <div class="mb-3">
          <label for="input-name" class="form-label">Jenis Kelamin</label>
          <div>
            <div class="form-check">
              <input type="radio" class="form-check-input" name="gender" value="pria" id="radio-pria" />
              <label for="radio-pria" class="form-check-label">Pria</label>
            </div>
            <div class="form-check">
              <input type="radio" class="form-check-input" name="gender" value="wanita" id="radio-wanita"/>
              <label for="radio-wanita" class="form-check-label">Wanita</label>
            </div>
          </div>
          @error('gender')
            <small class="text-danger mt-2">{{ $message }}</small>
          @enderror
        </div>
        <div class="mb-3">
          <label for="input-name" class="form-label">Pesan</label>
          <textarea
            type="text"
            class="form-control"
            id="input-name"
            name="message"
            rows="8"
          > {{old('message')}}</textarea>
          @error('message')
            <small class="text-danger mt-2">{{ $message }}</small>
          @enderror
        </div>
        <div class="mb-3">
          <label class="mb-1">Jenis Pesan</label>
          <select class="form-select" aria-label="Select" name="type">
            <option disabled>Pilih Jenis</option>
            <option value="komplain">Komplain</option>
            <option value="saran">Saran</option>
            <option value="pertanyaan">Pertanyaan</option>
          </select>
          @error('type')
            <small class="text-danger mt-2">{{ $message }}</small>
          @enderror
        </div>
        <div class="mb-3">
          <label for="input-name" class="form-label">Sumber Pemasukan</label>
          <div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="sources[]" value="Bekerja" id="checkbox-bekerja"/>
              <label for="checkbox-bekerja" class="form-check-label">Bekerja</label>
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="sources[]" value="Bisnis" id="checkbox-bisnis"/>
              <label for="checkbox-bisnis" class="form-check-label">Bisnis</label>
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="sources[]" value="Lainnya" id="radio-lainnya"/>
              <label for="radio-lainnya" class="form-check-label">Lainnya</label>
            </div>
          </div>
          @error('sources')
            <small class="text-danger mt-2">{{ $message }}</small>
          @enderror
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>