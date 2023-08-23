<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    use HasFactory;

    protected $fillable = ['operator_id_from', 'operator_id_to', 'cost'];
    protected $appends = ['operator_from_name', 'operator_to_name'];
    public function operatorFrom()
    {
        return $this->belongsTo(Operator::class, 'operator_id_from');
    }

    public function operatorTo()
    {
        return $this->belongsTo(Operator::class, 'operator_id_to');
    }

    public static function  getTariffBetweenOperators($operatorIdFrom, $operatorIdTo, $duration)
    {
       $tariff = self::where('operator_id_from', $operatorIdFrom)
            ->where('operator_id_to', $operatorIdTo)->orWhere('operator_id_from', $operatorIdTo)->where('operator_id_to', $operatorIdFrom)
            ->first();
        if ($tariff) {
            return $tariff->cost * $duration;
        } else {
            return 'Тариф не найден.';
        }

    }

    public function getOperatorFromNameAttribute()
    {
        return $this->operatorFrom->name;
    }

    public function getOperatorToNameAttribute()
    {
        return $this->operatorTo->name;
    }
}
