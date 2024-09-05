
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjualan | Order</title>

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

                        <li class="sidebar-item ">
                            <a href="{{ route('indexsalesman') }}" class='sidebar-link'>
                                <span>Salesman</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item active">
                            <a href="{{ route('indexsalesman') }}" class='sidebar-link'>
                                <span>Order</span>
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
                            <h3>Order Table</h3>
                            <button type="button" class="btn btn-info mb-3 mt-4 d-flex justify-content-center" data-bs-toggle="modal" data-bs-target="#tambah">
                                <span class="bi bi-plus-square me-2" style="padding-top: 2px;"></span>Add Order
                            </button>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Order Table</li>
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
                                        <th scope="col">ID Order</th>
                                        <th scope="col">Order Date</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Customer ID</th>
                                        <th scope="col">Salesman ID</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td scope="col">{{ $order->order_id }}</td>
                                    <td scope="col">{{ $order->order_date }}</td>
                                    <td scope="col">{{ $order->amount }}</td>
                                    <td scope="col">{{ $order->customer_id }}</td>
                                    <td scope="col">{{ $order->salesman_id }}</td>
                                    <td class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-primary me-1 d-flex" data-bs-toggle="modal" data-bs-target="#update{{ $order->order_id }}">
                                            <li class="bi bi-pencil-square me-1" style="list-style-type: none; padding-top: 6px"></li>
                                            <div style="padding-top: 4px">Ubah</div>
                                        </button>
                                        
                                        <button type="button" class="btn btn-danger d-flex" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $order->order_id }}">
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
    @foreach ($orders as $order)
    <div id="deleteModal{{ $order->order_id }}" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-end">
                        <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="mt-1">
                        <h4>Yakin untuk menghapus?</h4>
                        <p>Apakah benar anda ingin menghapus {{ $order->order_id }}?</p>
                    </div>
                    <form action="{{ route('deleteorder', $order->order_id) }}" method="post">
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
    @foreach ($orders as $order)
    <div class="modal fade bd-example-modal-lg" id="update{{ $order->order_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit order</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('order.update', $order->order_id) }}" method="POST">
                    @csrf
                    @method('PUT') 
                    <div class="modal-body">
                        <div class="mb-3 mt-3">
                            <label for="order_date" class="form-label">Order Date</label>
                            <input type="text" name="order_date" value="{{ $order->order_date}}" class="form-control">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="text" name="amount" value="{{ $order->amount }}" class="form-control">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="customer_id" class="form-label">Customer Id</label>
                            <input type="text" name="customer_id" value="{{ $order->customer_id }}" class="form-control">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="salesman_id" class="form-label">Salesman ID</label>
                            <input type="text" name="salesman_id" value="{{ $order->salesman_id }}" class="form-control">
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
                            <form action="{{ route('createOrder') }}" method="post">
                                @csrf
                                <div class="mb-3 mt-3">
                                    <label for="order_date" class="form-label">Order Date</label>
                                    <input type="date" name="order_date" class="form-control">
                                </div>
                                
                                <div class="mb-3 mt-3">
                                    <label for="amount" class="form-label">Amount</label>
                                    <input type="text" name="amount" class="form-control">
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="customer_id" class="form-label">Customer Id</label>
                                    <input type="text" name="customer_id" class="form-control">
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="salesman_id" class="form-label">Salesman Id</label>
                                    <input type="text" name="salesman_id" class="form-control">
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

</body>
</html>