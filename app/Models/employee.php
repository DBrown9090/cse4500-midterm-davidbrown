<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['Name', 'email', 'phone'];
    function getPhoneAttribute()
    {
        $cleaned = preg_replace('/[^[:digit:]]/', '', $this->phone);
        preg_match('/(\d{3})(\d{3})(\d{4})/', $cleaned, $matches);
        return "({$matches[1]}) {$matches[2]}-{$matches[3]}";
    }

    function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = preg_replace("/[^0-9]/","",$value);
    }
}
