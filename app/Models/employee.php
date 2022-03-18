<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['Name', 'Email', 'Phone'];
    public function getPhoneAttribute($value)
    {
        $phone = preg_replace("/[^0-9]/","",$this->Phone);
        return substr($phone ,2,3)."-".substr($phone ,6,3)."-".substr($phone ,10,4);
    }

    public function setPhoneAttribute($value){
        $this->attributes['Phone'] = preg_replace("/[^0-9]/","",$value);
    }
}
