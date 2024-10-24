<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Budget;

use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = auth()->user()->expenses()->get();

        return view('expenses.index', ['expenses' => $expenses]);
    }

    public function create()
    {
        
        return view('expenses.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'label' => ['required'],
            'amount' => ['required'],
        ]);

        $expense = auth()->user()->expenses()->create($attributes);
        

        return redirect('/expenses');
    }

    public function delete(Expense $expense)
    {
        $expense->delete();
        return redirect('/expenses');
    }
}
