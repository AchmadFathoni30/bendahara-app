<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;

    protected $table = 'credit';

    protected $primaryKey = 'id';

    protected $fillable = ['user_id','category_id','nominal','description','credit_date'];
}
