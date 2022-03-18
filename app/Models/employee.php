<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class employee extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Database\Factories\Administration\EmployeeFactory;

    protected $fillable = ['Name', 'email', 'phone'];
    protected static function newFactory()
    {
      return EmployeeFactory::new();
    }
}
