<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Employee;

class EmployeeController extends Controller
{ 
    
    public function index()
    {
        $employees = Employee::all();
        return view('pages.employees.list', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'photo' => 'required|image',
            'salary' => 'required|numeric',
            'address' => 'required|string',
            'country' => 'required|string',
            'status' => 'required|string',
        ]);

        $employees = new Employee;
        $employees->name = $request->name;
        $employees->dob = $request->dob;
        $employees->gender = $request->gender;
        $employees->salary = $request->salary;
        $employees->address = $request->address;
        $employees->country = $request->country;
        $employees->status = $request->status;

        $photo_file = $request->file('photo');
        Storage::putFile('public/img/', $photo_file);
        $employees->photo = "storage/img/".$photo_file->hashName();

        $employees->save();

        return redirect()->route('admin.employees.create')->with('success', "New Employee Created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employees = Employee::find($id);
        return view('pages.employees.edit', compact('employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'salary' => 'required|numeric',
            'address' => 'required|string',
            'country' => 'required|string',
            'status' => 'required|string',
        ]);

        $employees = Employee::find($id);
        
        $employees->name = $request->name;
        $employees->dob = $request->dob;
        $employees->gender = $request->gender;
        $employees->salary = $request->salary;
        $employees->address = $request->address;
        $employees->country = $request->country;
        $employees->status = $request->status;

        if($request->file('photo')){
            $photo_file = $request->file('photo');
            Storage::putFile('public/img/', $photo_file);
            $employees->photo = "storage/img/".$photo_file->hashName();
        }
        

        $employees->save();

        return redirect()->route('admin.employees.list')->with('success', "Employee Updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employees = Employee::find($id);

        @unlink(public_path($employees->photo));
        $employees->delete();

        return redirect()->route('admin.employees.list')->with('success', "Employee Deleted successfully");
    }
}
