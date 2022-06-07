<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Static Navigation - SB Admin</title>
    <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />
    <!-- Select 2 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css"
        integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">


    <style>
        .error {
            color: red;
        }

    </style>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>


</head>

<body>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{ route('admin.dashboard') }}">Start Bootstrap</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <!--  <div class="sb-sidenav-menu-heading">Core</div> -->
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <a class="nav-link" href="{{ route('admin.main') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Main
                        </a>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Services
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('admin.services.create') }}">Create</a>
                                <a class="nav-link" href="{{ route('admin.services.list') }}">List</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
                            <div class="sb-nav-link-icon"><i class="fas fa-images"></i></div>
                            Portfolio
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('admin.portfolios.create') }}">Create</a>
                                <a class="nav-link" href="{{ route('admin.portfolios.list') }}">List</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts2">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            About
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('admin.abouts.create') }}">Create</a>
                                <a class="nav-link" href="{{ route('admin.abouts.list') }}">List</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts4" aria-expanded="false" aria-controls="collapseLayouts4">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            New Employee
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts4" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('newemployees.create') }}">Create</a>
                                <a class="nav-link" href="{{ route('newemployees.index') }}">List</a>
                                <a class="nav-link" href="{{ route('newemployees.index1') }}">List1</a>
                            </nav>
                        </div>

                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                            Contact
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">

            @include('alert.messages')
            @yield('content')

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('admin/js/scripts.js') }}"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>

    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Select 2-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"
        integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $().ready(function() {
            $("#commonForm").validate({
                rules: {
                    icon: "required",
                    title: {
                        required: true,
                        minlength: 2
                    },
                    description: {
                        required: true,
                        minlength: 5
                    },
                    price: {
                        required: true,
                        digit: true,
                        maxlength: 5
                    },
                    warranty: {
                        required: true,
                        digit: true,
                        maxlength: 5
                    },
                },

                messages: {
                    icon: "Please enter icon",
                    title: {
                        required: "Please enter a title",
                        minlength: "Your title must consist of at least 2 characters"
                    },
                    description: {
                        required: "Please enter a description",
                        minlength: "Your description must be consist of at least 5 characters"
                    },
                    price: {
                        required: "Please enter a price",
                        maxlength: "Your price must be consist of at most 5 characters"
                    },
                    warranty: {
                        required: "Please enter warranty",
                        maxlength: "Your warranty must be consist of at most 5 characters"
                    }
                }
            });

            $.validator.addMethod('minfilesize', function(value, element, param) {
                return this.optional(element) || (element.files[0].size >= param)
            });
            $.validator.addMethod('maxfilesize', function(value, element, param) {
                return this.optional(element) || (element.files[0].size <= param)
            });

            $(".employeeData").validate({
                rules: {
                    name: "required",
                    dob: "required",
                    gender: "required",
                    salary: {
                        required: true,
                        number: true,
                        max: 999999999
                    },
                    photo: {
                        required: true,
                        extension: "jpg|jpeg|png|ico|bmp",
                        minfilesize: 1900,
                        maxfilesize: 200000
                    },
                    country: "required",

                    address: {
                        required: true,
                        minlength: 3
                    },
                },

                messages: {
                    name: "Please enter name",
                    dob: "Please enter date of birth",
                    gender: "Please enter gender",
                    salary: {
                        required: "Please enter salary",
                        max: "Your salary must be consist of at most 8 characters"
                    },
                    photo: {
                        required: "Please upload photo",
                        extension: "Wrong Format",
                        minfilesize: "File too short",
                        maxfilesize: "File too large"
                        //     maxFileSize : "Your photo must be consist of at most 100 KB",
                        //     minFileSize : "Your photo must be consist of at least 10 KB"
                    },
                    country: "Please enter country",

                    address: {
                        required: "Please enter address",
                        minlength: "Your Address must be consist of at least 3 characters"
                    },
                }
            });
        });
    </script>

    <script type="text/javascript">
        $('#dob').datepicker({
            beforeShow: function(i) {
                if ($(this).prop('readonly')) {
                    $(this).datepicker("option", "disabled", true);
                    return;
                }
            },

            uiLibrary: 'bootstrap5',
            format: 'yyyy/mm/dd',
            autoclose: true,
            todayHighlight: true,
            // startDate: '0d'

        });

        $(document).ready(function() {
            $("#gender").select2({
                placeholder: 'Select Gender'
            });

        });

        var loadFile = function(event) {
            var PreviewImg = document.getElementById('previewImg');
            PreviewImg.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        /* fetchemployee();

        function fetchemployee() {
            $.ajax({
                type: "GET",
                url: "{{ route('newemployees.fetchemployee') }}",
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    $('tbody').html(response);
                    $.each(response.newemployees, function (key, item) {
                        $('tbody').append('<tr>\
                            <th> ' + item.id + ' </th>\
                            <td> ' + item.name + ' </td>\
                            <td> ' + item.dob + ' </td>\
                            <td> ' + item.gender + ' </td>\
                            <td> ' + item.photo + ' </td>\
                            <td> ' + item.salary + ' </td>\
                            <td>' + item.address + ' </td>\
                            <td> ' + item.country + ' </td>\
                            <td> ' + item.status + ' </td>\
                            <td> <div class="row"> <div><a href="#" id="editEmployee" value="'+ item.id +'" class="btn btn-primary m-2">Edit</a></div><div>\
                            <form action="#" method="POST"><input type="submit" name="submit" value="Delete" id="deleteEmployee" class="btn btn-danger"></form></div></div></td>\
                            \</tr>');
                    });
                }
            });
        } */

        /* Modal show */

        $("#addEmployee").on('click', function() {
            $(".employeeData").trigger('reset');
            $("#modal_title").html('Add new employee');
            $("#myModal").modal('show');
        });

        /* $("body").on('click', '#editEmployee',function(){
            var id = $(this).data('id');
        }); */

        /* Add Employee Ajax Request */

        $(".employeeData").on('submit', function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $.ajax({
                url: "{{ route('newemployees.store') }}",
                type: "post",
                // data: $("#employeeData").serialize(),
                data: fd,
                processData: false,
                contentType: false,
                success: function(response) {
                    //console.log("response");
                    /* if (response.status == 200) {
                                Swal.fire(
                                    'Added!',
                                    'Employee Added Successfully!',
                                    'success'
                                )
                                fetchemployee(); 
                        }*/
                    alert("Success");
                    $(".employeeData")[0].reset();
                    $("#myModal").modal('hide');
                },
            });
        });

        /* $("#editEmployee").on('click', function() {
                    $("#modal_title").html('Edit new employee');
                    $("#editModal").modal('show');
                });
         */
        // edit employee ajax request

        $(".editEmployee").each(function(e) {
            $(this).on("click", function() {
                // e.preventDefault();
                var empID = $(this).data('id');
                $.ajax({
                    url: "{{ url('/admin/newemployees') }}/" + empID + '/edit',
                    method: 'get',
                    data: empID,
                    success: function(response) {
                        $("#name").val(response.name);
                        $("#dob").val(response.dob);
                        $("#gender").val(response.gender);
                        $("#gender").trigger('change');
                        $("#salary").val(response.salary);
                        $("#address").val(response.address);
                        $("#country").val(response.country);
                        let my_status = (response.status == 1) ? true : false;
                        $("#status").prop('checked', my_status);
                        $("#image_preview").html('');
                        let my_image = "{{ url('/storage/img') }}/" + response.photo;
                        $("#image_preview").html(
                            '<img style="height: 30vh" id="previewImg" src=' + my_image +
                            ' class="img-thumbnail">'
                        );
                        //$("#photo").attr(my_image.replace(/^.*[\\\/]/, ''));

                        $("#empID").val(response.id);
                        //$("#empID").val(response.photo);

                        // console.log(my_status);
                        $("#modal_title").html('Edit new employee');
                        $("#myModal").modal('show');
                    }
                });
            });
        });
        /* $(document).each('click', '#editEmployee', function(e) {
            e.preventDefault();
            var empID = $(this).data('id');
            $.ajax({
                url: "{{ url('/admin/newemployees') }}/" + empID + '/edit',
                method: 'get',
                data: empID,
                success: function(response) {
                    $("#name").val(response.name);
                    $("#dob").val(response.dob);
                    $("#gender").val(response.gender);
                    $("#gender").trigger('change');
                    $("#salary").val(response.salary);
                    $("#address").val(response.address);
                    $("#country").val(response.country);
                    $("#status").trigger('change');
                    $("#status").val(response.status);
                    $("#image_preview").html('');
                    let my_image = "{{ url('/storage/img') }}/" + response.photo;
                    $("#image_preview").html(
                        '<img style="height: 30vh" id="previewImg" src=' + my_image +
                        ' class="img-thumbnail">'
                    );
                    $("#empID").val(response.id);
                    $("#empID").val(response.photo);

                    console.log(response.name);
                }
            });
        }); */

        /* Update */

        $(".editEmployeeData").on('submit', function(e) {
            e.preventDefault();
            var empID = $('#empID').val();
            console.log(empID);
            const fdt = new FormData(this);
            console.log(fdt);
            // return false;
            $.ajax({
                url: "{{ url('/admin/newemployees/update') }}/" + empID,
                method: 'put',
                data: fdt,
                // cache: false,
                contentType: false,
                processData: false,
                // dataType: 'json',
                success: function(response) {
                    alert("updated");
                    //$("#editEmployeeData")[0].reset();
                    $("#myModal").modal('hide');
                }
            });
        });
    </script>
    {{-- jquery datatable start --}}
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable({
                lengthMenu: [
                    [5, 10, 20, -1],
                    [5, 10, 20, 'All'],
                ],
            });
        });
    </script>
    {{-- jquery datatable ends --}}
    {{-- yajra datatable starts --}}
    <script>
        $(function() {
            $('#dataTableYajra').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('newemployees.get') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'dob',
                        name: 'dob'
                    },
                    {
                        data: 'gender',
                        name: 'gender'
                    },
                    {
                        data: 'photo',
                        name: 'photo'
                    },
                    {
                        data: 'salary',
                        name: 'salary'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'country',
                        name: 'country'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    }
                ]
            });
        });
    </script>
</body>

</html>
