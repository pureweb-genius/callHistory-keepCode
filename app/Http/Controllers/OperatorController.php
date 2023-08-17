<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function index()
    {
        $operators = Operator::all();
        return view('operators.index', compact('operators'));
    }

    public function create()
    {
        return view('operators.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'prefix' => 'required|string',
        ]);

        Operator::create($data);

        return redirect()->route('operator.index');
    }

    public function destroy($id)
    {
        $operator = Operator::findOrFail($id);
        $operator->delete();
        return redirect()->route('operator.index');
    }
}
