<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;

    public const TYPE_MOVEMENT = [
        'OUT' => 'Saída',
        'IN'  => 'Entrada',
    ];

    protected $guarded = ['id'];

    protected $fillable = [
        'type_movement',
        'amount',
        'note',
        'employee_id',
        'admin_id',
    ];

    protected $appends = ['employee_name', 'type'];

    public function getEmployeeNameAttribute()
    {
        return $this->employee->fullname;
    }

    public function getTypeAttribute()
    {
        return  Movement::TYPE_MOVEMENT[$this->type_movement];
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public static function search($search)
    {
        return Movement::paginate(10);
    }
}
