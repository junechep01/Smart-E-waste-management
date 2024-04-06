<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'requests';


    protected $fillable = [
        'message','user_id', 'date', 'time', 'image', 'points', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
