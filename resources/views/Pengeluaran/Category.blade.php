@extends('Layout.Default')
@section('content')
    @include('sweetalert::alert')
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
                                <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                    data-bs-target="#modal-add">
                                    <i class="mdi mdi-plus-circle"></i> Add Category
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>N0</th>
                                            <th>Nama Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp

                                        @foreach ($data as $data)
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td class="text-center">
                                                    <a href="#">
                                                        <i class="ri-edit-2-line"></i>
                                                    </a>
                                                    <a href="">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

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

    </div>
    <!-- END wrapper -->

    <!-- SignIn modal content -->
    <div id="modal-add" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="auth-brand text-center mt-2 mb-4 position-relative top-0">
                        <span><img src="{{ asset('Bootstrap/assets/images/LogoMasjid.png') }}" alt="dark logo" height="100"></span>
                    </div>

                    <form action="#" method="post" class="ps-3 pe-3">
                        @csrf
                        <div class="mb-3">
                            <label for="emailaddress1" class="form-label">Nama Kategori</label>
                            <input class="form-control" type="text" name="name" required="">
                        </div>

                        <div class="mb-3 text-right">
                            <button class="ri-send-plane-line btn rounded-pill btn-primary" type="submit">Simpan</button>
                            <button class="ri-refresh-line btn rounded-pill btn-warning" type="reset">Reset</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
