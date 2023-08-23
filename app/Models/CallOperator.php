<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallOperator extends Model {

    protected $with = ['from', 'to'];
    protected $fillable = ['call_id', 'from_operator', 'to_operator'];

    public function from() {
        return $this->belongsTo(Operator::class, 'from_operator');
    }

    public function to() {
        return $this->belongsTo(Operator::class, 'to_operator');
    }
}




