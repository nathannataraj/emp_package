<?php

namespace Elumina\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Elumina\Employee\Employee;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('elumina.employee.index',compact('employees'));
    }

    public function create()
    {
        return view('elumina.employee.create');
    }

    public function store(Request $request)
    {

        $rules = [
            'fullName'=>'required|min:3',
            'email'=>'required|email|unique:employees',
            'profile' => 'required',
            'address' => 'required',
            'status' => Rule::in(['active','inactive'])
        ];
        
        $this->validate($request, $rules);
        $employee = new Employee;
        $employee->fullName = $request->fullName;
        $employee->email = $request->email;
        $employee->profile = $request->profile;
        $employee->address = $request->address;
        $employee->status = $request->status;
        $employee->created_by = 1;
        $employee->save();
        return redirect()->route('employee.index')->with('success', 'Employee added successfully');
    }

    public function edit(Employee $employee)
    {
        return view('elumina.employee.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $rules = [
            'fullName'=>'required|min:3',
            'email'=>'required|email|unique:employees,email,'.$employee->id,
            'profile' => 'required',
            'address' => 'required',
            'status' => Rule::in(['active','inactive'])
        ];
        
        $this->validate($request, $rules);
        $employee->fullName = $request->fullName;
        $employee->email = $request->email;
        $employee->profile = $request->profile;
        $employee->address = $request->address;
        $employee->status = $request->status;
        $employee->updated_by = 1;
        $employee->update();
        return redirect()->route('employee.index')->with('success', 'Employee updated successfully');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index')->with('success', 'Employee deleted successfully');
    }
}
