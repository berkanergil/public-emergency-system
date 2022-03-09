<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public static function messages()
    {
        return Message::all();
    }
    public function editor()
    {
        return $this->hasMany(Event::class);
    }
}
