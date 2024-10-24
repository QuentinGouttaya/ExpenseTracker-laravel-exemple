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
            return view('/budget.index', ['budget' => $budget]);
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
        

        return redirect('/expenses');
    }

}
