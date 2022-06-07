@extends('layouts.admin_layout')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">List of Services</h1>
            <div class="container">
                <!-- Trigger the modal with a button -->
                {{-- [onClick="employee_data(0)"] --}}
                <button type="button" class="btn btn-info btn-lg" style="float: right;" id="addEmployee">Add New
                    Employee</button>

                <!-- Add Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                                <h4 class="modal-title" id="modal_title"></h4>
                            </div>
                            <div class="modal-body">
                                <form action="#" method="POST" enctype="multipart/form-data"
                                    class="employeeData editEmployeeData">
                                    @csrf
                                    <input type="hidden" value="0" id="empID">
                                    <div class="row">
                                        <div class="form-group col-md-4 mt-3">
                                            <div class="mb-3">
                                                <label for='name'>
                                                    <h4>Name</h4>
                                                </label>
                                                <input type="text" class="form-control" id="name" name="name">
                                            </div>

                                            <div class="mb-4">
                                                <label for='salary'>
                                                    <h4>Salary</h4>
                                                </label>
                                                <input type="text" class="form-control" id="salary" name="salary">
                                            </div>
                                            <div class="mb-4">
                                                <label for='country'>
                                                    <h4>Country</h4>
                                                </label>
                                                <input type="text" class="form-control" id="country" name="country">
                                            </div>

                                            <div class="mb-4">
                                                <label for='address'>
                                                    <h4>Address</h4>
                                                </label>
                                                <textarea type="text" class="form-control" id="address" name="address"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4 mt-3">
                                            <div>
                                                <h3>Photo</h3>
                                                <div id="image_preview">
                                                    <img style="height: 30vh" id="previewImg"
                                                        src="{{ asset('storage/img/bc_img.jpg') }}"
                                                        class="img-thumbnail">
                                                </div>

                                                <input class="mt-2" type="file" name="photo" id="photo"
                                                    accept="image/*" onchange="loadFile(event);">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4 mt-3">
                                            <div class="mb-4">
                                                <label for='dob'>
                                                    <h4>Date of Birth</h4>
                                                </label>
                                                <!--   <input class="form-control" id="dob" name="dob" value=""> -->
                                                <input type="text" class="form-control" id="dob" name="dob" readonly>
                                            </div>

                                            <div class="mb-4">
                                                <label for='gender'>
                                                    <h4>Gender</h4>
                                                </label>
                                                <select name="gender" id="gender" class="form-control">
                                                    <option value=""> </option>
                                                    <?php $genders = ['Male', 'Female']; ?>
                                                    @foreach ($genders as $gender)
                                                        <option value="{{ $gender }}">{{ $gender }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-4">
                                                <label for='status'>
                                                    <h4>Status</h4>
                                                </label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="status" class="custom-control-input"
                                                        id="status">
                                                    <label class="custom-control-label" for="customSwitches">Full
                                                        Time</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" name="submit" id="btnSubmit"
                                        class="btn btn-primary mt-5 add_employee">
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
                <!-- End Add Modal -->
            </div>
        </div>



        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">List of Services</li>
        </ol>

        {{-- <table class="table table_class">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Address</th>
                    <th scope="col">Country</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="listEmployee">

                @if (count($newemployees) > 0)
                    @foreach ($newemployees as $newemployee)
                        <tr>
                            <th scope="row">{{ $newemployee->id }}</th>
                            <td>{{ $newemployee->name }}</td>
                            <td>{{ $newemployee->dob }}</td>
                            <td>{{ $newemployee->gender }}</td>
                            <td>
                                <img style="height: 10vh" src="{{ url('/storage/img/' . $newemployee->photo) }}"
                                    alt="photo">
                            </td>
                            <td>{{ $newemployee->salary }}</td>
                            <td>{{ Str::limit(strip_tags($newemployee->address), 30) }}</td>
                            <td>{{ $newemployee->country }}</td>
                            <td>{{ $newemployee->status }}</td>
                            <td>
                                <div class="row">
                                    <div>
                                        <a href="#" data-id="{{ $newemployee->id }}"
                                            class="btn btn-primary m-2 editEmployee">Edit</a>
                                    </div>
                                    <div>
                                        <form action="{{ route('newemployees.destroy', $newemployee->id) }}"
                                            method="POST">
                                            @csrf
                                            @method ('DELETE')
                                            <input type="submit" name="submit" id="deleteEmployee"
                                                data-id="{{ $newemployee->id }}" value="delete" class="btn btn-danger">
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table> --}}

        <section>
            <div class="container">
                <table class="table table-bordered" id="dataTableYajra">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Date of Birth</th>
                            <th>Gender</th>
                            <th>Photo</th>
                            <th>Salary</th>
                            <th>Address</th>
                            <th>Country</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </section>

    </main>
@endsection
