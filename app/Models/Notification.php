<?php

namespace App\Models;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public static function notifications()
    {
        return Notification::all();
    }
    public function editor()
    {
        return $this->hasMany(Event::class);
    }
}
