<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Todo extends Model
{
    use HasFactory;

    protected $table = 'todo';
    protected $fillable = [
        'title',
        'description',
        'status',
        'due_date',
    ];

    // relationships can be defined here if needed
    public function user(){
        return $this->belongsTo(User::class);
    }
}
