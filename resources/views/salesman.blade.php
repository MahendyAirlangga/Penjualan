
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjualan | Salesman</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset ('assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset ('assets/vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets/css/app.css') }}">
</head>

<body>
<div id="app">
<div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <a href="index.php" class="mt-2 ms-1">Penjualan</a>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu" id="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item">
                            <a href="{{ route('indexcust') }}" class='sidebar-link'>
                                <span>Customer</span>
                            </a>
                        </li>

                        <li class="sidebar-item  active">
                            <a href="{{ route('indexsalesman') }}" class='sidebar-link'>
                                <span>Salesman</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item">
                            <a href="{{ route('indexorder') }}" class='sidebar-link'>
                                <span>order</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        <!-- Main -->
        <div id="main">
            <header class="mb-3">
                <a href="" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Salesman Table</h3>
                            <button type="button" class="btn btn-info mb-3 mt-4 d-flex justify-content-center" data-bs-toggle="modal" data-bs-target="#tambah">
                                <span class="bi bi-plus-square me-2" style="padding-top: 2px;"></span>Add Salesman
                            </button>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Salesman Table</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover table-borderless" id="datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">ID Salesman</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">City</th>
                                        <th scope="col">Commision</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Tombol Hapus dalam tabel -->
                                @foreach ($salesmans as $salesman)
                                <tr>
                                    <td scope="col">{{ $salesman->salesman_id }}</td>
                                    <td scope="col">{{ $salesman->salesman_name }}</td>
                                    <td scope="col">{{ $salesman->salesman_city }}</td>
                                    <td scope="col">{{ $salesman->commission }}</td>
                                    <td class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-primary me-1 d-flex" data-bs-toggle="modal" data-bs-target="#update{{ $salesman->salesman_id }}">
                                            <li class="bi bi-pencil-square me-1" style="list-style-type: none; padding-top: 6px"></li>
                                            <div style="padding-top: 4px">Ubah</div>
                                        </button>
                                        
                                        <button type="button" class="btn btn-danger d-flex" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $salesman->salesman_id }}">
                                            <li class="bi bi-trash me-1" style="list-style-type: none; padding-top: 6px"></li>
                                            <div style="padding-top: 4px">Hapus</div>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- Modal Delete -->
    @foreach ($salesmans as $sales)
    <div id="deleteModal{{ $sales->salesman_id }}" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-end">
                        <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="mt-1">
                        <h4>Yakin untuk menghapus?</h4>
                        <p>Apakah benar anda ingin menghapus {{ $sales->salesman_name }}?</p>
                    </div>
                    <form action="{{ route('deletesalesman', $sales->salesman_id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="d-flex justify-content-end gap-2">
                            <button class="btn btn-secondary me-2" data-bs-dismiss="modal">Batal</button>
                            <button class="btn btn-danger" type="submit">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

    <!-- Modal Update-->
    @foreach ($salesmans as $sales)
    <div class="modal fade bd-example-modal-lg" id="update{{ $sales->salesman_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit salesman</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('salesman.update', $sales->salesman_id) }}" method="POST">
                    @csrf
                    @method('PUT') 
                    <div class="modal-body">
                        <div class="mb-3 mt-3">
                            <label for="salesman_name" class="form-label">Name</label>
                            <input type="text" name="salesman_name" value="{{ $sales->salesman_name }}" class="form-control">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="salesman_city" class="form-label">City</label>
                            <input type="text" name="salesman_city" value="{{ $sales->salesman_city }}" class="form-control">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="commission" class="form-label">Commission</label>
                            <input type="text" name="commission" value="{{ $sales->commission }}" class="form-control">
                        </div>
                        <div class="submit mt-4">
                            <button type="submit" name="update" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach


    <!-- Modal Tambah Barang -->
    <div class="modal fade bd-example-modal-lg" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Salesman</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('addsalesman') }}" method="post">
                                @csrf
                                <div class="mb-3 mt-3">
                                    <label for="id_jasa" class="form-label">Name</label>
                                    <input type="text" name="salesman_name" class="form-control">
                                </div>
                                
                                <div class="mb-3 mt-3">
                                    <label for="nama_jasa" class="form-label">City</label>
                                    <input type="text" name="salesman_city" class="form-control">
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="nama_jasa" class="form-label">Commission</label>
                                    <input type="text" name="commission" class="form-control">
                                </div>

                                <div class="submit mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        Add
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
    </div>


    <script src="{{ asset ('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset ('assets/js/main.js') }}"></script>
    <script src="{{ asset ('assets/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            var deleteModal = document.getElementById('deleteModal');
            deleteModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget; // Button that triggered the modal
                var customerId = button.getAttribute('data-id'); // Extract info from data-id attribute
                
                // Set the form action and hidden input field
                var form = deleteModal.querySelector('form');
                form.action = "{{ route('deletecust', '') }}/" + customerId;
                form.querySelector('input[name="id"]').value = customerId;
            });
        });
        </script> --}}

</body>
</html>