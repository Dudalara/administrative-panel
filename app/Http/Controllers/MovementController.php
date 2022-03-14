<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Movement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovementController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $movements = Movement::search($request);
        return view('movement.index')->with('movements', $movements);
    }

    public function createForm()
    {
        $employees = Employee::all();

        return view('movement.new')->with('employees', $employees);
    }

    public function create(Request $request)
    {
        $request['admin_id'] = Auth::guard('admin')->user()->id;
        $request['type_movement'] = $request->typeMovement;
        $request['employee_id'] = $request->employeeId;
        $request['amount'] = floatval($request->amount);

        $this->validator($request);
        $data = $request->all();

        $movement = new Movement($data);
        $movement->save();

        return redirect()->route('movement.index')->with('success', 'Movimentação cadastrado');
    }

    private function validator($data, $employee = null)
    {
        return $data->validate(
            [
                'type_movement' => 'required|in:OUT,IN',
                'amount'        => 'required|numeric',
                'note'          => 'required|string',
                'employee_id'   => 'required|exists:employees,id',
                'admin_id'      => 'exists:admins,id',
            ],
            [
                'type_movement.required' => 'Campo Tipo é obrigatório!',
                'type_movement.in'       => 'Campo deve ser Entrada ou Saída!',
                'amount.numeric'         => 'Campo Valor é numérico!',
                'amount.required'        => 'Campo Valor é obrigatório!',
                'note.required'          => 'Campo Observação é obrigatório!',
                'note.string'            => 'Campo Observação deve ser letras!',
                'employee_id.exists'     => 'Campo Funcionário é obrigatório!',
                'employee_id.required'   => 'O Id deve existir na tabela funcionários!',
                'admin_id.exists'        => 'O Id deve existir na tabela admins!',
            ]
        );
    }
}
