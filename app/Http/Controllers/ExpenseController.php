<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseType;
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
        $expenseTypes = auth()->user()->expenseTypes()->get();
        return view('expenses.create', ['expenseTypes' => $expenseTypes]);
    }

    public function store(Request $request)
    {

        $attributes = $request->validate([
            'expense_type_id' => ['required', 'integer'],
            'label' => ['required', 'string'],
            'amount' => ['required', 'numeric'],
        ]);

        $expense = auth()->user()->expenses()->create([
            'expense_type_id' => $attributes['expense_type_id'],
            'label' => $attributes['label'],
            'amount' => $attributes['amount'],
        ]);

        

        return redirect('/expenses');
    }

    public function delete(Expense $expense)
    {
        $expense->delete();

        return redirect('/expenses');}
}

