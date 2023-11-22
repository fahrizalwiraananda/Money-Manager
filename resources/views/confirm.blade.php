<!DOCTYPE html>
<html lang="en">
<head>
    <title>Konfirmasi</title>
    @include('layouts.head')
</head>
<body>
    <div class="container mt-5">
        @auth
        <br><br><br><br><br><br><br><br><br>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success text-center" role="alert">
                    Sukses ! Terimakasih telah mengisi !
                </div>

                <div class="d-grid gap-2 mt-5 mb-3">
                    <a href="/eva" class="btn btn-sm btn-outline-primary shop">Kembali</a>
                 </div>
            </div>
        </div>
        @endauth
    </div>
</body>
</html>
 
