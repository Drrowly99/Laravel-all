<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    public function customer (){
        return $this->hasOne(Customer::class, 'AGENT_CODE', 'AGENT_CODE');
    }

    public function customer_many (){
        return $this->hasMany(Customer::class, 'AGENT_CODE', 'AGENT_CODE');
    }
}
