<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'amount',
        'purpose',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
