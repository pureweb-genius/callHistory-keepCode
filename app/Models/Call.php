<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $fillable = [
        'call_from',
        'call_to',
        'duration',
        'cost',
    ];
    use HasFactory;


    public function userFrom()
    {
        return $this->belongsTo(User::class, 'call_from');
    }

    public function userTo()
    {
        return $this->belongsTo(User::class, 'call_to');
    }

    public function operators()
    {
        return $this->hasMany(CallOperator::class, 'call_id');
    }

    // Calculate the total call duration for the user and time range
    public static function getTotalCallDurationByUserAndDateRange($userId, $timeRange)
    {
        $timeRange = self::getTimeRange($timeRange);

        return Call::where('call_from', $userId)->orWhere('call_to',$userId)->whereBetween('created_at', $timeRange)->sum('duration');
    }

    // Calculate the total call cost for the user and time range
    public static function getTotalCallCostByUserAndDateRange($userId, $timeRange)
    {
        $timeRange = self::getTimeRange($timeRange);

        return Call::where('call_from', $userId)->whereBetween('created_at', $timeRange)->sum('cost');
    }

    public static function getTimeRange($timeRange){
        $now = Carbon::now();

        // Determine the time range based on the provided value
        switch ($timeRange) {
            case 'hour':
                $data['start'] = $now->copy()->startOfHour();
                $data['end'] = $now->copy()->endOfHour();
                break;
            case 'week':
                $data['start'] = $now->copy()->startOfWeek();
                $data['end'] = $now->copy()->endOfWeek();
                break;
            case 'month':
                $data['start'] = $now->copy()->startOfMonth();
                $data['end'] = $now->copy()->endOfMonth();
                break;
            default:
                abort(404);
        }
        return $data;

    }
}
