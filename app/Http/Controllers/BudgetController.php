<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BudgetController extends Controller
{

    public function index() {
        if (!auth()->user()->budget()->exists()) {
            return view('budget.create');   
        } else {
            $budget = auth()->user()->budget()->first();
            $balance = auth()->user()->balance();
            return view('/budget.index', ['budget' => $budget,'balance'=> $balance]);
        }
    }

    public function link() {
        if (!auth()->user()->budget()->exists()) {
            return view('budget.create');
        } else {
            return view('budget.link');
        }
    }

    public function create()
    {

        return view('budget.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'amount' => ['required'],
        ]);

        $budget = auth()->user()->budget()->create($attributes);
        

        return redirect('/budget');
    }

    public function update(Request $request) {
        $attributes = $request->validate([
            'amount' => ['required'],
        ]);
        auth()->user()->budget()->update($attributes);
        return redirect('/budget');
    }

    public function set(Request $request) {
        $attributes = $request->validate([
            'amount' => ['required'],
        ]);
        $budget = auth()->user()->budget()->create($attributes);
        return redirect('/budget');
    }

}
