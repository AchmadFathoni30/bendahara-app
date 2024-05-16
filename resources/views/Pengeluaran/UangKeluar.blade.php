@extends('Layout.Default')
@section('content')

<!-- Include jQuery and DataTables library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Add modal content --}}
<div id="addModalUangKeluar" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="auth-brand text-center mt-2 mb-4 position-relative top-0">
                    <img src="{{ asset('Bootstrap/assets/images/LogoMasjid.png') }}" alt="dark logo" height="100">
                </div>

                <form action="#" method="POST" id="add_uangkeluar_form" class="ps-3 pe-3">
                    @csrf
                    <div class="mb-2">
                        <label for="category_id" class="form-label">Nama Kategori</label>
                        <input class="form-control" type="text" name="category_id" required>
                    </div>

                    <div class="mb-2">
                        <label for="nominal" class="form-label">Nominal</label>
                        <input class="form-control" type="number" name="nominal" required>
                    </div>

                    <div class="mb-2">
                        <label for="description" class="form-label">Description</label>
                        <input class="form-control" type="text" name="description" required>
                    </div>

                    <div class="mb-2">
                        <label for="debit_date" class="form-label">Tanggal</label>
                        <input class="form-control" type="date" name="debit_date" required>
                    </div>

                    <div class="mb-3 text-right">
                        <button type="submit" id="add_uangkeluar_btn" class="ri-send-plane-line btn rounded-pill btn-primary">Add Uang Keluar</button>
                        <button type="button" class="ri-refresh-line btn rounded-pill btn-warning" data-bs-dismiss="modal">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Add modal content end --}}

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Velonic</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Data Tables</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Data Tables</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addModalUangKeluar">
                                <i class="mdi mdi-plus-circle"></i> Add Uang Keluar
                            </button>
                        </div>
                        <div class="card-body" id="show_all_uangkeluar">
                            <h1 class="text-center text-secondary my-5">Loading...</h1>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div> <!-- end row-->
        </div> <!-- container -->

    </div> <!-- content -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Masjid Jami'ALJannah - Achmad Fathoni
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->

<script>
    $(function() {

        fetchAllTransaksi();

        function fetchAllTransaksi() {
            $.ajax({
                url: `{{ route('fetchAllUangKeluar') }}`,
                method: 'get',
                success: function(res) {
                    $("#show_all_uangkeluar").html(res);
                    $("table").DataTable({
                        order: [0, 'desc']
                    });
                }
            });
        }
    })
</script>

@endsection