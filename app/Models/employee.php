<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Database\Factories\EmployeeFactory;


class employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['Name', 'email', 'phone'];
    protected static function newFactory()
    {
      return EmployeeFactory::new();
    }
}
