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



    public function editor()
    {
        return $this->belongsTo(Staff::class);
    }
}
