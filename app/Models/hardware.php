<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class hardware extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['Name','manufacturer_id','hwcategory_id','CPU','RAM','Storage'];
}
