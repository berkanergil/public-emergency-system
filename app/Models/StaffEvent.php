<?php

namespace App\Models;

use App\Models\Staff;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StaffEvent extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=[];

    public function eventStatus(){
        return $this->belongsTo(EventStatus::class);
    }

    public function staff(){
        return $this->belongsTo(Staff::class);
    }

}
