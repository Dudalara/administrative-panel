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

    public static function search($search)
    {
        if ($search != null) {
            $searchTerm = "%{$search}%";
            return Employee::where('fullname', 'LIKE', $searchTerm)
                                   ->orWhere('created_at', 'LIKE', $searchTerm)
                                   ->orderBy('fullname', 'desc')
                                   ->paginate(20);
        }

        return Employee::paginate(20);
    }
}
