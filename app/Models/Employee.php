<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'fullname',
        'login',
        'password',
        'current_balance',
        'admin_id',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public static function search($request)
    {
        if ($request != null) {
            return Employee::when($request->fullname, function ($query) use ($request) {
                $query->where('fullname', 'LIKE', '%'.$request->fullname.'%');
            })
                            ->when($request->date_created, function ($query) use ($request) {
                                $query->where('created_at', 'LIKE', '%'.$request->date_created.'%');
                            })
                            ->orderBy('fullname', 'ASC')
                            ->paginate(10);
        }

        return Employee::paginate(10);
    }
}
