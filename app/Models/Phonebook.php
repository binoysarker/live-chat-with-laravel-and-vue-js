<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phonebook extends Model
{
    protected $fillable=['name','email','phone_no'];
    protected $hidden=['created_at','updated_at'];
}
