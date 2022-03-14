<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $employees = Employee::search($request);
        return view('employee.index')->with('employees', $employees);
    }

    public function createForm()
    {
        return view('employee.new');
    }

    public function create(Request $request)
    {
        $request['admin_id'] = Auth::guard('admin')->user()->id;

        $this->validator($request);
        $data = $request->all();

        $employee = new Employee($data);
        $employee->save();

        return redirect()->route('employee.index');
    }

    public function editForm($employeeId)
    {
        $employee = Employee::find($employeeId);

        return view('employee.edit')->with('employee', $employee);
    }

    public function update(Request $request, $employeeId)
    {
        $employee = Employee::find($employeeId);

        $this->validator($request, $employeeId);

        $data = array_filter($request->all());

        $employee->fill($data);
        $employee->save();

        return redirect()->route('employee.index');
    }

    public function destroy($employeeId)
    {
        $employee = Employee::find($employeeId);
        $employee->delete();

        return redirect()->route('employee.index');
    }

    private function validator($data, $employee = null)
    {
        if ($employee) {
            return $data->validate([
                'fullname'        => 'string',
                'login'           => 'string',
                'password'        => '',
                'current_balance' => 'numeric',
                'admin_id'        => 'exists:admins,id',
            ]);
        } else {
            return $data->validate([
                'fullname'        => 'required|string',
                'login'           => 'required|string',
                'password'        => 'required|min:6',
                'current_balance' => 'nullable|numeric',
                'admin_id'        => 'exists:admins,id',
            ]);
        }
    }
}
