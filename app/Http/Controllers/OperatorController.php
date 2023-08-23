<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use App\Services\OperatorService;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    protected OperatorService $operatorService;
    public function __construct(OperatorService $operatorService)
    {
        $this->operatorService = $operatorService;
    }

    public function index()
    {
        $operators = $this->operatorService->getAll();
        return view('operators.index', compact('operators'));
    }

    public function create()
    {
        return view('operators.create');
    }

    public function store(Request $request)
    {
        $this->operatorService->store($request);

        return redirect()->route('operator.index');
    }

    public function destroy($id)
    {
        $this->operatorService->destroy($id);

        return redirect()->route('operator.index');
    }



}
