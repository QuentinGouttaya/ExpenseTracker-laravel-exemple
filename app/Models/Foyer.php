<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Expense;
use App\Models\User;
use App\Models\Budget;

class Foyer extends Model
{
        /** @use HasFactory<\Database\Factories\UserFactory> */
        use HasFactory;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
    protected $fillable = [
        'user_id',
        ];
        
        protected $casts = [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];

    public function users() {
        return $this->hasMany(User::class);
    }


public function budgetsSum() {
    return $this->hasManyThrough(Budget::class, User::class)->sum('amount');
}



}