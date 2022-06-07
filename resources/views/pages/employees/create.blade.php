@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Create</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        <form action="{{route('employees.store')}}" method="POST" enctype="multipart/form-data" id="employeeData">
            @csrf
            
            <div class="row">
                <div class="form-group col-md-3 mt-3">
                    <h3>Photo</h3>
                    <img style="height: 30vh" src="{{asset('pages/assets/img/big_image.jpg')}}" class="img-thumbnail">
                    <input class="mt-2" type="file" name="photo">
                 </div>
                 
                <div class="form-group col-md-4 mt-3">
                    <div class="mb-3">
                        <label for='name'> <h4>Name</h4></label>
                        <input type="text" class="form-control" id="name" name="name" value="">
                    </div> 
                    <div class="mb-4">
                        <label for='dob'> <h4>Date of Birth</h4></label>
                     <!--   <input class="form-control" id="dob" name="dob" value=""> -->
                        <input type="text" class="form-control" id="dob" name="dob">
                    </div>
                    <div class="mb-4">
                        <label for='gender'> <h4>Gender</h4></label>
                    <!--    <input type="text" class="form-control" id="gender" name="gender" value=""> -->
                    <!--    <select name="gender" id="gender" class="form-control">
                            <option></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    -->
                    <select name="gender" id="gender" class="form-control">
                        <option value=""> </option>
                    <?php    $genders = array("Male", "Female"); ?>
                        @foreach($genders as $gender)
                                <option value="{{ $gender }}" >{{ $gender }}</option>
                        @endforeach
                    </select>    

                    </div>
                    <div class="mb-4">
                        <label for='salary'> <h4>Salary</h4></label>
                        <input type="text" class="form-control" id="salary" name="salary" value="">
                    </div>
                    <div class="mb-4">
                        <label for='country'> <h4>Country</h4></label>
                        <input type="text" class="form-control" id="country" name="country" value="">
                    </div>
                    <div class="mb-4">
                        <label for='status'> <h4>Status</h4></label>
                        <!-- <input type="text" class="form-control" id="status" name="status" value=""> -->
                    <!--    <select name="status" id="status" class="form-control">
                            <option></option>
                            <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>
                            <option value="Intern">Intern</option>
                        </select>
                    -->    
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" />
                            <label class="form-check-label" for="flexSwitchCheckDefault">Full Time</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <h3>Address</h3>
                        <textarea class="form-control" name="address" rows="5"></textarea>
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" class="btn btn-primary mt-5">
        </div>
    </form>
</main>
<script>
    $().ready(function(){  
                
                
            });
    </script>
@endsection