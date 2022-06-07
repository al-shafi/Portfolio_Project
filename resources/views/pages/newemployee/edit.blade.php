@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Create</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        <form action="{{route('newemployees.update', $newemployees->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-md-4 mt-3">
                    <div class="mb-3">
                        <label for='name'> <h4>Name</h4></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$newemployees->name}}">
                    </div> 

                    <div class="mb-4">
                        <label for='salary'> <h4>Salary</h4></label>
                        <input type="text" class="form-control" id="salary" name="salary" value="{{$newemployees->salary}}">
                    </div>
                    <div class="mb-4">
                        <label for='country'> <h4>Country</h4></label>
                        <input type="text" class="form-control" id="country" name="country" value="{{$newemployees->country}}">
                    </div>

                    <div class="mb-4">
                        <label for='address'> <h4>Address</h4></label>
                        <textarea type="text" class="form-control" id="address" name="address">{{$newemployees->address}}</textarea>
                    </div>    
                </div>

                <div class="form-group col-md-4 mt-3">
                    <div>
                        <h3>Photo</h3>
                        <img style="height: 30vh" id="previewImg" src="{{$newemployees->photo}}" class="img-thumbnail">
                        <input class="mt-2" type="file" name="photo" accept="image/*" onchange="loadFile(event);">
                    </div>
                </div>
                <div class="form-group col-md-4 mt-3">
                    <div class="mb-4">
                        <label for='dob'> <h4>Date of Birth</h4></label>
                     <!--   <input class="form-control" id="dob" name="dob" value=""> -->
                        <input type="text" class="form-control" id="dob" name="dob" value="{{$newemployees->dob}}" readonly >
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
                          <label for='status'> <h4>Status</h4></label>
                        {{-- <div class="mb-4">
                        <input type="text" class="form-control" id="status" name="status" >
                        </div> --}}
                        <!-- Default switch -->
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="status" class="custom-control-input" id="customSwitches">
                            <label class="custom-control-label" for="customSwitches">Full Time</label>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" class="btn btn-primary mt-5">
        </div>
    </form>
</main>

@endsection