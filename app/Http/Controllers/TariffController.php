<?php

namespace App\Http\Controllers;

use App\Http\Requests\TariffRequest;
use App\Models\Operator;
use App\Models\Tariff;
use Illuminate\Http\Request;

class TariffController extends Controller
{
    public function index()
    {
        $tariffs = Tariff::all();
        return view('tariffs.index', compact('tariffs'));
    }

    public function create()
    {
        $operators = Operator::all();
        return view('tariffs.create', compact('operators'));
    }

    public function store(TariffRequest $request)
    {
        $data = $request->validated();

        Tariff::create($data);

        return redirect()->route('tariff.index');
    }

    public function destroy($id)
    {
        $operator = Tariff::findOrFail($id);
        $operator->delete();
        return redirect()->route('tariff.index');
    }

    public function edit($id)
    {
        $tariff = Tariff::findOrFail($id);
        $operators = Operator::all();
        return view('tariffs.edit', compact('tariff', 'operators'));
    }

    public function update(TariffRequest $request, $id)
    {
        $data = $request->validated();
        $tariff = Tariff::findOrFail($id);
        $tariff->update($data);
        return redirect()->route('tariff.index');
    }
}
