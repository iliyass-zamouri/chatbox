<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Message extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'from',
        'to',
        'text',
    ];
    protected $dates=[
        'deleted_at'
    ];
    public function fromContact()
    {
        return $this->hasOne(User::class, 'id', 'from');
    }
}
