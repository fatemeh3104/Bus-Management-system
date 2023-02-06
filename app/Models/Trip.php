<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    public function Bus(){
        return $this->belongsTo(Bus::class);
    }
    public function Users(){
        return $this->belongsToMany(User::class,Trip_User::class);

    }
    protected $fillable = ['capacity'];
}
