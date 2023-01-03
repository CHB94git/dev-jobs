<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vacant_id',
        'cv'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
