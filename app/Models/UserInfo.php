<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserInfo extends Model
{
    use HasFactory;
    protected $table = 'user_info';

    protected $fillable = [
        'first_name',
        'last_name',
        'photo',
        'email',
        'user_id',
        'country',
        'code',
        'phone',
        'birth_date'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }


}
