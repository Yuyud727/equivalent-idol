<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';

    public $timestamps = false; // Disable timestamps

    protected $primaryKey = 'row_number';

    protected $fillable = [
        'row_number',
        'event_date',
        'event_name',
        'event_description',
    ];
}
