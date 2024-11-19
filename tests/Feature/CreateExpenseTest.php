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

        // Create an expense type
        $this->get('/expenses/types')->assertStatus(200);
        $this->post('/expenses/types', ['name' => 'Test Expense Type'])->assertRedirect('/expenses/create');

        // Retrieve the created expense type
        $expenseType = ExpenseType::where('user_id', $user->id)->where('name', 'Test Expense Type')->first();
        $this->assertNotNull($expenseType, 'Expense type was not created.');
        $this->assertEquals($user->id, $expenseType->user_id, 'Expense type user ID does not match.');

        // Fill in the expense form with valid data
        $expenseData = [
            'expenseType' => $expenseType->id, // Use 'expenseType' instead of 'expense_type_id'
            'label' => 'Test Expense',
            'amount' => 151.11,
        ];

        // Submit the form
        $response = $this->post('/expenses', $expenseData);
        $response->assertRedirect('/expenses');

        // Verify that the expense is created successfully and appears in the list of expenses
        $this->assertDatabaseHas('expenses', [
            'expense_type_id' => $expenseType->id,
            'label' => 'Test Expense',
            'amount' => 151.11,
        ]);

        // Debugging: Print the response content
        $response = $this->get('/expenses');
        $response->assertStatus(200);
        dump($response->getContent());

        // Assert that the amount is displayed on the page
        $response->assertSee('151.11');
    }
}
