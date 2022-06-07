@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">List of Services</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">List of Services</li>
        </ol>

        <table class="table">
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
            <tbody>

            @if (count($employees)>0)
                @foreach ($employees as $employee)
                    <tr>
                        <th scope="row">{{$employee->id}}</th>
                        <td>{{$employee->name}}</td>
                        <td>{{$employee->dob}}</td>
                        <td>{{$employee->gender}}</td>
                        <td>
                            <img style="height: 10vh" src="{{url($employee->photo)}}" alt="photo">
                        </td>
                        <td>{{$employee->salary}}</td>
                        <td>{{Str::limit(strip_tags($employee->address), 30)}}</td>
                        <td>{{$employee->country}}</td>
                        <td>{{$employee->status}}</td>
                        <td>
                            <div class="row">
                                <div>
                                    <a href="{{route('admin.employees.edit', $employee->id)}}" class="btn btn-primary m-2">Edit</a>
                                </div>
                                <div>
                                    <form action="{{route('admin.employees.destroy', $employee->id)}}" method="POST">
                                        @csrf
                                        @method ('DELETE')
                                        <input type="submit" name="submit" value="delete" class="btn btn-danger">
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
              
              
            </tbody>
          </table>
       
</main>

@endsection