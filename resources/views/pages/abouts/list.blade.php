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
                <th scope="col">Title 1</th>
                <th scope="col">Title 2</th>
                <th scope="col">Image</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

            @if (count($abouts)>0)
                @foreach ($abouts as $about)
                    <tr>
                        <th scope="row">{{$about->id}}</th>
                        <td>{{$about->title1}}</td>
                        <td>{{$about->title2}}</td>
                        <td>
                            <img style="height: 10vh" src="{{url($about->image)}}" alt="image">
                        </td>
                        <td>{{Str::limit(strip_tags($about->description), 30)}}</td>
                        <td>
                            <div class="row">
                                <div>
                                    <a href="{{route('admin.abouts.edit', $about->id)}}" class="btn btn-primary m-2">Edit</a>
                                </div>
                                <div>
                                    <form action="{{route('admin.abouts.destroy', $about->id)}}" method="POST">
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