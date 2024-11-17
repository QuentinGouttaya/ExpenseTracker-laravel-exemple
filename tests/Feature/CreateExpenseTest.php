<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\ExpenseType;
use App\Models\User;
use App\Models\Expense;
use Carbon\Carbon;

class CreateExpenseTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_expense()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        // Visit the expenses page
        $this->get('/expenses')->assertStatus(200);

        // Click the "Create Expense" button
        $this->get('/expenses/create')->assertStatus(200);

        // Fill in the expense form with valid data
        $expenseType = ExpenseType::factory()->create();
        $expenseData = [
            'expense_type_id' => $expenseType->id,
            'label' => 'Test Expense',
            'amount' => 100.00,
            'created_at' => Carbon::now()
        ];

        // Submit the form
        $this->post('/expenses', $expenseData)->assertRedirect('/expenses');

        // Verify that the expense is created successfully and appears in the list of expenses
        $this->assertDatabaseHas('expenses', $expenseData);
        $this->get('/expenses')->assertSee($expenseData['amount']);
    }
}