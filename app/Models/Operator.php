<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'prefix',
    ];

    public function callOperatorsFrom()
    {
        return $this->hasMany(CallOperator::class, 'from_operator');
    }

    public function callOperatorsTo()
    {
        return $this->hasMany(CallOperator::class, 'to_operator');
    }


    public function callsFrom()
    {
        return $this->hasManyThrough(Call::class, CallOperator::class, 'from_operator', 'id', 'id', 'call_id');
    }

    public function callsTo()
    {
        return $this->hasManyThrough(Call::class, CallOperator::class, 'to_operator', 'id', 'id', 'call_id');
    }






}
