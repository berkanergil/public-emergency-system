<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notes extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public static function notesForEvent($id)
    {
        $notesForEvent = DB::table('notes')->join('events', 'notes.event_id', '=', 'events.id')->get();
        return $notesForEvent;
    }
}
