@extends('Layout.Default')
@section('content')

<!-- Include jQuery and DataTables library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Add modal content --}}
<div id="addModalCategory" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="auth-brand text-center mt-2 mb-4 position-relative top-0">
                    <img src="{{ asset('Bootstrap/assets/images/LogoMasjid.png') }}" alt="dark logo" height="100">
                </div>

                <form action="#" method="POST" id="add_category_form" class="ps-3 pe-3">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Kategori</label>
                        <input class="form-control" type="text" name="name" required>
                    </div>

                    <div class="mb-3 text-right">
                        <button type="submit" id="add_category_btn" class="ri-send-plane-line btn rounded-pill btn-primary">Add Category</button>
                        <button type="button" class="ri-refresh-line btn rounded-pill btn-warning" data-bs-dismiss="modal">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Add modal content end --}}

{{-- Update modal content --}}
<div id="updateModalCategory" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="auth-brand text-center mt-2 mb-4 position-relative top-0">
                    <img src="{{ asset('Bootstrap/assets/images/LogoMasjid.png') }}" alt="dark logo" height="100">
                </div>

                <form action="#" method="POST" id="update_category_form" class="ps-3 pe-3">
                    @csrf
                    <input type="hidden" name="temp_id" id="temp_id">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Kategori</label>
                        <input class="form-control" type="text" name="fname" id="fname" required>
                    </div>

                    <div class="mb-3 text-right">
                        <button type="submit" id="update_category_btn" class="ri-send-plane-line btn rounded-pill btn-primary">Update Category</button>
                        <button type="button" class="ri-refresh-line btn rounded-pill btn-warning" data-bs-dismiss="modal">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Update modal content end --}}
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
                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addModalCategory">
                                <i class="mdi mdi-plus-circle"></i> Add Category
                            </button>
                        </div>
                        <div class="card-body" id="show_all_categories">
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

</div>
<!-- END wrapper -->

<script>
    $(function(){

        viewCategory();

        function viewCategory(){
            $.ajax({
                url: `{{ route('fetchAll') }}`,
                method: 'get',
                success: function(res){
                    $("#show_all_categories").html(res);
                    $("table").DataTable({
                        order:[0, 'desc']
                    });
                }
            });
        }

        $("#add_category_form").submit(function(e){
            e.preventDefault();
            const af = new FormData(this);
            $("#add_category_btn").text('Adding...');
            $.ajax({
                url: "{{ route('inputCategoryCredit') }}",
                method: 'post',
                data: af,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(res){
                    if (res.status == 200) {
                        console.log(res);
                        Swal.fire(
                            'Added!',
                            'Category Added Successfully!',
                            'success'
                        );
                        viewCategory();
                    }
                    $("#add_category_btn").text('Add Category');
                    $("#add_category_form")[0].reset();
                    $("#addModalCategory").modal('hide');
                },
                error: function(abc, status, error){
                    console.error(abc.responseText);
                    Swal.fire(
                        'Error!',
                        'Failed to add Category',
                        'error'
                    );
                    $("#add_category_btn").text('Add Category');
                }
            });
        });

        $(document).on('click', '.editIcon', function(e){
            e.preventDefault();
            let id = $(this).attr('id');
            $.ajax({
                url: `{{ route('FormEditCategory') }}`,
                method: 'get',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(res){
                    $("#fname").val(res.name);
                    $("#temp_id").val(res.id);
                }
            });
        });

        $("#update_category_form").submit(function(e){
            e.preventDefault();
            const af = new FormData(this);
            $("#update_category_btn").text('Updating...');
            $.ajax({
                url: `{{ route('EditCategory') }}`,
                method: 'post',
                data: af,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response){
                    if (response.status == 200) {
                        Swal.fire(
                            'Updated!',
                            'Category Updated Successfully!',
                            'success'
                        )
                        viewCategory();
                    }
                    $("#update_category_btn").text('Update Category');
                    $("#update_category_form")[0].reset();
                    $("#updateModalCategory").modal('hide');
                }
            });
        });

        $(document).on('click', '.deleteIcon', function(e){
            e.preventDefault();
            let id = $(this).attr('id');
            let csrf = '{{  csrf_token() }}';
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `{{ route('HapusCategory') }}`,
                        method: 'delete',
                        data: {
                            id: id,
                            _token: csrf
                        },
                        success: function(response){
                            console.log(response);
                            Swal.fire(
                                'Deleted!',
                                'Your data has been deleted',
                                'success'
                            )
                            viewCategory();
                        }
                    });
                }
            });
        });
    });
</script>

@endsection