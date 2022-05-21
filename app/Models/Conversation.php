<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $table = 'conversation';

    protected $hidden = ['created_at', 'updated_at'];

    public function messages(){
        return $this->hasMany(Message::class, 'conversation_id', 'id');
    }

    public function users(){
        return $this->hasMany(User::class, 'conversation_id', 'id');
    }
}
