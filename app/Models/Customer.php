<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function agent (){
        return $this->belongsTo(Agent::class, 'AGENT_CODE', 'AGENT_CODE');
    }
}
