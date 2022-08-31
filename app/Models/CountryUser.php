<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryUser extends Model
{
    use HasFactory;

    protected $table="country_user";
    protected $fillable=['user_id','country_id'];

    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
