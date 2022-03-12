<?php

namespace App\Observers;

use App\Models\Employee;
use App\Models\Movement;
use Illuminate\Validation\ValidationException;

class MovementObserver
{
    /**
     * Handle the Movement "created" event.
     *
     * @param  \App\Models\Movement  $movement
     * @return void
     */
    public function creating(Movement $movement)
    {
        $employee = Employee::find($movement->employee_id);

        if ($movement->type_movement == 'OUT') {
            if (!isset($employee->current_balance) ||  $movement->amount >= $employee->current_balance) {
                throw ValidationException::withMessages(['message' => 'Saldo insuficiente']);
            }
            $employee->current_balance -=  $movement->amount;
        } elseif ($movement->type_movement == 'IN') {
            $employee->current_balance +=  $movement->amount;
        }

        $employee->save();
    }
}
