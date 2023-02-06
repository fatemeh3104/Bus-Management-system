<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip_User extends Model
{
    use HasFactory;
    protected $fillable =['user_id','trip_id','seatNum'];

}
