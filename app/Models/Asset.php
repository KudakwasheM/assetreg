<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'make',
        'model',
        'type',
        'assettag',
        'serial',
        'age',
        'purchased',
        'warranty',
        'warranty_expiry',
        'assigned',
        'active',
        'user_id',
        'departmenet_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
