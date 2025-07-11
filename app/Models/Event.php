<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_date',
        'event_name',
        'location',
        'status',
        'ticket_url',
        'description',
        'poster_image',
        'is_featured',
        'order'
    ];

    protected $casts = [
        'event_date' => 'date',
        'is_featured' => 'boolean'
    ];

    // Scope untuk upcoming events
    public function scopeUpcoming($query)
    {
        return $query->where('status', 'upcoming')
                    ->where('event_date', '>=', now())
                    ->orderBy('event_date');
    }

    // Scope untuk semua event yang tidak cancelled
    public function scopeActive($query)
    {
        return $query->where('status', '!=', 'cancelled')
                    ->orderBy('order', 'asc')
                    ->orderBy('event_date', 'asc');
    }

    // Scope untuk featured events
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // Accessor untuk format tanggal Indonesia
    public function getFormattedDateAttribute()
    {
        $months = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];

        if ($this->event_date) {
            $day = $this->event_date->format('d');
            $month = $months[(int)$this->event_date->format('m')];
            $year = $this->event_date->format('Y');
            
            return "{$day} {$month} {$year}";
        }

        return 'TBA';
    }

    // Accessor untuk status badge color
    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'upcoming' => 'bg-blue-100 text-blue-800',
            'ongoing' => 'bg-green-100 text-green-800',
            'completed' => 'bg-gray-100 text-gray-800',
            'cancelled' => 'bg-red-100 text-red-800',
            'tba' => 'bg-yellow-100 text-yellow-800',
            default => 'bg-gray-100 text-gray-800'
        };
    }

    // Accessor untuk status text
    public function getStatusTextAttribute()
    {
        return match($this->status) {
            'upcoming' => 'SHOW',
            'ongoing' => 'LIVE',
            'completed' => 'SELESAI',
            'cancelled' => 'BATAL',
            'tba' => 'TBA',
            default => 'TBA'
        };
    }
}