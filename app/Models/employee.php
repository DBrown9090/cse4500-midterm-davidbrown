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
    public function getphoneAttribute($value)
    {
        $phone = preg_replace("/[^0-9]/","",$this->phone);
        return substr($phone ,2,3)."-".substr($phone ,6,3)."-".substr($phone ,10,4);
    }

    public function setphoneAttribute($value){
        $this->attributes['phone'] = preg_replace("/[^0-9]/","",$value);
    }
}
