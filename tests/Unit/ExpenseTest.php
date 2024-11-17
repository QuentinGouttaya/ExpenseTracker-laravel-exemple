<?php

namespace Tests\Unit;


use App\Models\Expense;
use App\Models\ExpenseType;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;

class ExpenseTest extends TestCase
{
/**
 * Test that an expense can be created.
 */
public function test_it_can_be_instantiated(): void
{
    $expense = new Expense();
    Log::info('Expense:', [$expense]);
    $this->assertInstanceOf(Expense::class, $expense);
}

/**
 * Test that an expense can be created with a user ID.
 */
public function test_it_can_be_created_with_a_user_id(): void
{
    $user = User::factory()->create();
    Log::info('User:', [$user]);
    $expense = Expense::factory()->create([
        "user_id" => $user->id,
    ]);
    Log::info('Expense:', [$expense]);
    $this->assertEquals($user->id, $expense->user_id);
}

/**
 * Test that the created expense types belong to the user only.
 */
public function test_expense_types_belong_to_user(): void
{
    $user = User::factory()->create();
    Log::info('User:', [$user]);
    $expenseType = ExpenseType::factory()->create([
        "user_id" => $user->id,
    ]);
    Log::info('Expense Type:', [$expenseType]);
    $this->assertEquals($user->id, $expenseType->user_id);

    $otherUser = User::factory()->create();
    Log::info('Other User:', [$otherUser]);
    $this->assertNotEquals($otherUser->id, $expenseType->user_id);
}

/**
 * Test that the created expenses belong to the user only and expense type belongs to user.
 */
public function test_expenses_belong_to_user_and_expense_type_belongs_to_user(): void
{
    $user = User::factory()->create();
    Log::info('User:', [$user]);
    $expenseType = ExpenseType::factory()->create([
        "user_id" => $user->id,
    ]);
    Log::info('Expense Type:', [$expenseType]);

    $expense = Expense::factory()->create([
        "user_id" => $user->id,
        "expense_type_id" => $expenseType->id,
    ]);
    Log::info('Expense:', [$expense]);

    $this->assertEquals($user->id, $expense->user_id);
    $this->assertEquals($expenseType->id, $expense->expense_type_id);
    $this->assertEquals($user->id, $expenseType->user_id);

    $otherUser = User::factory()->create();
    Log::info('Other User:', [$otherUser]);
    $this->assertNotEquals($otherUser->id, $expense->user_id);
    $this->assertNotEquals($otherUser->id, $expenseType->user_id);
}
}