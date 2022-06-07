<?php

namespace App\Http\Controllers;

use App\Models\NewEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class NewEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newemployees = NewEmployee::all();
        return view('pages.newemployee.list', compact('newemployees'));
    }
    public function index1()
    {
        return view('pages.newemployee.list1');
    }
    public function get()
    {
        return datatables()
        ->of(NewEmployee::query())->make(true)
        ->editColumn('photo', function($newEmployees){
            $url= asset('pages/assets/storage/img/$newEmployees->photo');
            return '<img src="'.$url.'" border="0" width="40" class="img-rounded" align="center" />';
        });
    }

    /* public function fetchemployee()
    {
        $newemployees = NewEmployee::all();
        return response()->json([
            'newemployees'=>$newemployees,
        ]);
    } */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.newemployee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        
        $this->validate($request, [
            'name' => 'required|string',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'photo' => 'required|image',
            'salary' => 'required|numeric',
            'address' => 'required|string',
            'country' => 'required|string',
            //'status' => 'required|string',
        ]);

        $newemployees = new NewEmployee;
        $newemployees->name = $request->name;
        $newemployees->dob = $request->dob;
        $newemployees->gender = $request->gender;
        $newemployees->salary = $request->salary;
        $newemployees->address = $request->address;
        $newemployees->country = $request->country;
        
        $newemployees->status = ($request->status=='on')?1:0;

        $photo_file = $request->file('photo');
        Storage::putFile('public/img/', $photo_file);
        $newemployees->photo = $photo_file->hashName();

        $newemployees->save();

        return redirect()->route('newemployees.index')->with('success', "New Employee Created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewEmployee  $newEmployee
     * @return \Illuminate\Http\Response
     */
    public function show(NewEmployee $newEmployee)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewEmployee  $newEmployee
     * @return \Illuminate\Http\Response
     */
    /* public function edit(NewEmployee $newEmployee, $id)
    {
        
        $newemployees = NewEmployee::find($id);
        return view('pages.newemployee.edit', compact('newemployees'));
    } */

    public function edit($id)
    {
       // $id = $request->id;
		$newEmployees = NewEmployee::find($id);
		return response()->json($newEmployees);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewEmployee  $newEmployee
     * @return \Illuminate\Http\Response
     */
    /* public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required|string',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'salary' => 'required|numeric',
            'address' => 'required|string',
            'country' => 'required|string',
         //   'status' => 'required|string',
        ]);

        $newemployees = NewEmployee::find($id);
        
        $newemployees->name = $request->name;
        $newemployees->dob = $request->dob;
        $newemployees->gender = $request->gender;
        $newemployees->salary = $request->salary;
        $newemployees->address = $request->address;
        $newemployees->country = $request->country;
        $newemployees->status = $request->status;

        if($request->file('photo')){
            $photo_file = $request->file('photo');
            Storage::putFile('public/img/', $photo_file);
            $newemployees->photo = $photo_file->hashName();
        }
        

        $newemployees->save();

        return redirect()->route('newemployees.index')->with('success', "Employee Updated successfully");
    } */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required|string',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'salary' => 'required|numeric',
            'address' => 'required|string',
            'country' => 'required|string',
         //   'status' => 'required|string',
        ]);

        $newemployees = NewEmployee::find($id);
        
        $newemployees->name = $request->name;
        $newemployees->dob = $request->dob;
        $newemployees->gender = $request->gender;
        $newemployees->salary = $request->salary;
        $newemployees->address = $request->address;
        $newemployees->country = $request->country;
        $newemployees->status = $request->status;

        if($request->file('photo')){
            $photo_file = $request->file('photo');
            Storage::putFile('public/img/', $photo_file);
            $newemployees->photo = $photo_file->hashName();
        }

        $newemployees->save();

        return redirect()->route('newemployees.index')->with('success', "Employee Updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewEmployee  $newEmployee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $newemployees = NewEmployee::find($id);

        @unlink(public_path($newemployees->photo));
        $newemployees->delete();

        return redirect()->route('newemployees.index')->with('success', "Employee Deleted successfully");
    }
}
