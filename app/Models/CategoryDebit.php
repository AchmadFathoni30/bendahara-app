<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryDebit extends Model
{
    use HasFactory;

    protected $table = 'categories_debit';

    protected $primaryKey = 'id';

    protected $fillable = ['user_id','name'];
}
