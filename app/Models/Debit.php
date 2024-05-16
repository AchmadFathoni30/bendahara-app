<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debit extends Model
{
    use HasFactory;

    public $table = 'debit';

    protected $fillable = ['user_id','category_id','nominal','description','debit_date'];

    protected $primaryKey = 'id';
}
