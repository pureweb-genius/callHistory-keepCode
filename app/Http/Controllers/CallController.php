<?php

namespace App\Http\Controllers;

use App\Http\Requests\CallRequest;
use App\Models\CallOperator;
use App\Models\Tariff;
use App\Services\CallService;
use Illuminate\Http\Request;
use App\Models\Call;
use App\Models\Operator;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CallController extends Controller
{
    protected CallService $callService;

    public function __construct(CallService $callService)
    {
        $this->callService = $callService;
    }


    public function index()
    {
        $calls = $this->callService->getAll();

        return view('calls.index', compact('calls'));
    }

    public function create()
    {
        $users = User::all();
        $operators = Operator::all();
        return view('calls.create', compact('users', 'operators'));
    }

    public function store(CallRequest $request)
    {
        $this->callService->store($request->validated());

        // Redirect to the calls page after successful saving
        return redirect()->route('call.index');
    }

    public function destroy($id)
    {
        $this->callService->destroy($id);
        return redirect()->route('call.index');
    }

    public function userStatistic($userId)
    {
        $userName = User::find($userId)->name;
        return view('calls.statistics', compact('userId','userName'));
    }
    public function getStatistic(Request $request)
    {
        // Calculate the total cost and duration of calls for the specified user and time range
        $data['totalCost']=Call::getTotalCallCostByUserAndDateRange($request['user_id'], $request['timeRange']);
        $data['totalDuration'] = Call::getTotalCallDurationByUserAndDateRange($request['user_id'], $request['timeRange']);

        return $data;
    }
}

