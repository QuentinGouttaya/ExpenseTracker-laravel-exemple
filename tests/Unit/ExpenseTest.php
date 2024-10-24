<?php

namespace Tests\Unit;


use Tests\TestCase;
use App\Models\User;
use App\Models\Expense;


class ExpenseTest extends TestCase
{
    /**
     * Test that an expense can be created.
     */
    public function test_it_can_be_instantiated(): void
    {
        
        $user = User::factory()->create();

        $expense = Expense::factory()->create([
            "user_id"=> $user->id
        ]); 
        $this->assertInstanceOf(Expense::class, $expense);
        $this->assertInstanceOf(Expense::class,$expense);   
    }   
}
