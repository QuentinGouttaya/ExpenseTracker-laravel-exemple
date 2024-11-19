<?php

namespace App\Http\Controllers;

use App\Models\Foyer;
use Illuminate\Http\Request;

use App\Models\User;

class FoyerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foyer_id = auth()->user()->foyer_id;

        if ($foyer_id == null) {
            return view("foyer.create");
        }

        $foyer_id = auth()->user()->foyer_id;
        $foyer = Foyer::find($foyer_id);
        $budgetSum = $foyer->budgetsSum();
        $balanceUsersFoyer = 0;
        foreach ($foyer->users as $user) {
            $balanceUsersFoyer += $user->balance();
        }

        if ($foyer_id != null) {
            return view("foyer.index", ['foyerBalance' => $balanceUsersFoyer, 'budgetSum' => $budgetSum, 'foyer_id' => $foyer_id]);
        } else {
            return view("foyer.create");
        }
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->foyer()) {
            return view("foyer.index", ['foyer' => auth()->user()->foyer()]);
        } else {
            return redirect("/foyer");
        }
        
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
       $foyer = Foyer::create();
       $user = auth()->user();
       $user->foyer_id = $foyer->id;
       $user->save();
       
       return redirect("/foyer");
    }

    public function removeFromFoyer() {
        $user = auth()->user();
        $foyer_id = $user->foyer_id;
        $user->foyer_id = null;
        $user->save();
        if (User::where("foyer_id", $foyer_id)->exists()) {
            return redirect('/');
        } else {
            Foyer::destroy($foyer_id);
        }
        
        return redirect('/');
    }

    public function addIntoFoyer(Request $request) {
        $attributes = $request->validate([
            'user_email' => ['required', 'email'],
        ]);
        $user_email = $attributes['user_email'];
        $foyer_id = User::where('email', $user_email)->first()->foyer_id;
        $user = auth()->user();
        $user->foyer_id = $foyer_id;
        $user->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Foyer $foyer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Foyer $foyer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Foyer $foyer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Foyer $foyer)
    {
    }
}
