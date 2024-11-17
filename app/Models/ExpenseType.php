<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExpenseType extends Model
{
      /** @use HasFactory<\Database\Factories\ExpenseFactory> */
      use HasFactory;

      protected $fillable = ['name', 'user_id'];
  

}
