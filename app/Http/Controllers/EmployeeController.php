<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Movement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
        $request['current_balance'] = floatval($request->current_balance);

        $this->validator($request);
        $data = $request->all();

        $employee = new Employee($data);
        $employee->save();

        return redirect()->route('employee.index')->with('success', 'Usuário cadastrado');
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

    public function destroy(Request $request, $employeeId)
    {
        $employee = Employee::find($request->employee_id);
        $this->listMovements($employee->id);
        $employee->delete();

        return redirect()->route('employee.index');
    }

    private function validator($data, $employee = null)
    {
        if ($employee) {
            return $data->validate(
                [
                'fullname'        => 'string',
                'login'           => ['string', Rule::unique('employees')->ignore($this->employee)],
                'password'        => '',
                'current_balance' => 'numeric',
                'admin_id'        => 'exists:admins,id',
            ],
                [
                'fullname.string'          => 'Campo Nome deve ser letras!',
                'login.unique'             => 'O campo login deve ser único!',
                'password.min'             => 'O tamanho mínimo é :min',
                'current_balance.numeric'  => 'O campo Saldo deve ser numérico',
                'admin_id.exists'          => 'O Id deve existir na tabela admins',
            ]
            );
        } else {
            return $data->validate(
                [
                'fullname'        => 'required|string',
                'login'           => 'required|unique:employees',
                'password'        => 'required|min:6',
                'current_balance' => 'nullable|numeric',
                'admin_id'        => 'exists:admins,id',
            ],
                [
                'fullname.required'        => 'Campo Nome obrigatório!',
                'fullname.string'          => 'Campo Nome deve ser letras!',
                'login.required'           => 'Campo login é obrigatório!',
                'login.unique'             => 'Campo login deve ser único!',
                'password.required'        => 'Campo Senha é obrigátorio!',
                'password.min'             => 'O tamanho mínimo é :min!',
                'current_balance.numeric'  => 'O campo Saldo deve ser numérico!',
                'admin_id.exists'          => 'O Id deve existir na tabela admins!',
            ]
            );
        }
    }

    private function listMovements($employeeId)
    {
        return Movement::where('employee_id', $employeeId)
                        ->delete();
    }
}
