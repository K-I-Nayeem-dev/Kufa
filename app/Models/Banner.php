<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getUserName(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
