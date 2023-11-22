<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Manager</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js" integrity="sha512-GMGzUEevhWh8Tc/njS0bDpwgxdCJLQBWG3Z2Ct+JGOpVnEmjvNx6ts4v6A2XJf1HOrtOsfhv3hBKpK9kE5z8AQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @include('layouts.head')
</head>
<body>
    @include('components.navbar')
    <div class="container">
        @auth
        <div class="row">
            <div class="col-4">

                <canvas id="myChart" width="400" height="400" class="mt-5"></canvas>

                <div class="row mt-3">
                    <div class="col-6">
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5 text-or" id="staticBackdropLabel">Aktivitas Keuangan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/activity" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="input-description" class="form-label">Description</label>
                                            <input type="text" class="form-control" id="input-description" name="description" value="{{ old('description')}}">
                                            @error('description')
                                            <small class="text-danger mt-2">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="input-nominal" class="form-label">Nominal</label>
                                            <input type="text" class="form-control" id="input-nominal" name="nominal" value="{{ old('nominal')}}">
                                            @error('nominal')
                                            <small class="text-danger mt-2">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-orange w-100" type="submit">Add</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-orange w-100">Add</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">                        
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5 text-or" id="staticBackdropLabel">Import File Pencatatan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/spreadsheet" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <h5>Import File</h5>
                                                <div class="mb-1">
                                                    <input class="form-control" type="file" id="formFile" name="file">
                                                    @error('file')
                                                    <small class="text-danger mt-2">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                          </div>
                                    </form>
                    
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-orange">Upload</button>
                                    <button type="reset" class="btn btn-red"><span>Delete</span></button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>               
               
            </div>
            <div class="col-8">
                <div class="button mb-3 ">
                    <button type="button" class="btn btn-yellow" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Add
                    </button>

                    <button type="button" class="btn btn-yellow" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                        Import
                    </button>

                    <a href="/spreadsheet">
                        <button class="btn btn-yellow">Export</button>    
                    </a>
                   
                </div>
                
                <ol class="list-group">
                    @foreach($activities as $act)
                    <li class="list-group-item d-flex align-items-center justify-content-between py-3">
                        <div class="d-flex flex-column">
                            <span>{{ $act->description }}</span>
                            <small>{{ $act->nominal }}</small>
                        </div>
                        <form action="/activity">
                            <div class="btn-group">
                                <a class="btn btn-outline-primary" href="/activity/{{ $act->id }}/update">Update</a>
                                <button
                                    class="btn btn-outline-danger"
                                    formmethod="POST"
                                >
                                @csrf

                                @method('DELETE')
                                
                                <input type="hidden" name="id" value="{{ $act->id }}">
                                
                                    <span>Delete</span>
                                </button>
                            </div>
                        </form>
                    </li>
                    @endforeach    
                </ol>
            </div>
        </div>
        @endauth
    </div>
    @auth
        <script>
            const ctx = document.getElementById("myChart").getContext("2d");
            const data = {
                labels: ["Pemasukan", "Pengeluaran"],
                datasets: [{
                    data: ["{{ $income }}", "{{ $expense }}"],
                    backgroundColor: ["rgb(52, 190, 130)", "rgb(255, 81, 81)"]
                }]
            };
            const myChart = new Chart(ctx, {
                data: data,
                type: 'doughnut'
            });
        </script>
    @endauth

</body>
</html>

