<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $table = 'contato';
    protected $fillable = [
        'id',
        'name',
        'email',
        'phone_number',
        'date_birth',
        'user_id',
    ];
}
