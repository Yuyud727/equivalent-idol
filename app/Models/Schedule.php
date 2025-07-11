<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Schedule extends Model
{
    protected $table = 'schedule';

    protected $primaryKey = 'id';

    protected $fillable = [
        'row_number',
        'event_date',
        'event_name',
        'event_description',
        'location',
        'instagram_url',
        'youtube_url',
        'status',
        'event_type',
        'is_featured'
    ];

    protected $casts = [
        'event_date' => 'datetime',
        'is_featured' => 'boolean'
    ];

    // Accessor for formatted date
    public function getFormattedDateAttribute()
    {
        return $this->event_date ? $this->event_date->format('d M Y') : null;
    }

    // Accessor for detailed formatted date
    public function getDetailedFormattedDateAttribute()
    {
        return $this->event_date ? $this->event_date->format('l, F j, Y \a\t g:i A') : null;
    }

    // Accessor for status text
    public function getStatusTextAttribute()
    {
        return match($this->status) {
            'available' => 'Available',
            'live' => 'Live Now',
            'tba' => 'To Be Announced',
            'cancelled' => 'Cancelled',
            default => 'Unknown'
        };
    }

    // Accessor for status icon
    public function getStatusIconAttribute()
    {
        return match($this->status) {
            'available' => '✅',
            'live' => '🔴',
            'tba' => '⏳',
            'cancelled' => '❌',
            default => '❓'
        };
    }

    // Accessor for event type label
    public function getEventTypeLabelAttribute()
    {
        return match($this->event_type) {
            'recording' => 'Recording',
            'shoot' => 'Video Shoot',
            'live_stream' => 'Live Stream',
            'performance' => 'Performance',
            'photoshoot' => 'Photo Session',
            'interview' => 'Interview',
            default => 'Event'
        };
    }

    // Accessor for description
    public function getDescriptionAttribute()
    {
        return $this->event_description;
    }

    // Check if event is live
    public function getIsLiveAttribute()
    {
        return $this->status === 'live';
    }

    // Check if event is available
    public function getIsAvailableAttribute()
    {
        return $this->status === 'available';
    }

    // Check if event is TBA
    public function getIsTbaAttribute()
    {
        return $this->status === 'tba';
    }

    // Check if event is in the future
    public function getIsUpcomingAttribute()
    {
        return $this->event_date && $this->event_date->isFuture();
    }

    // Get time until event
    public function getTimeUntilEventAttribute()
    {
        if (!$this->event_date || !$this->is_upcoming) {
            return null;
        }

        return $this->event_date->diffForHumans();
    }

    // Scope for upcoming events
    public function scopeUpcoming($query)
    {
        return $query->where('event_date', '>', now());
    }

    // Scope for live events
    public function scopeLive($query)
    {
        return $query->where('status', 'live');
    }

    // Scope for featured events
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // Scope for available events
    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    // Get main action URL (Instagram, YouTube, or info)
    public function getMainActionUrlAttribute()
    {
        if ($this->status === 'live' && $this->youtube_url) {
            return $this->youtube_url;
        }
        
        if ($this->instagram_url) {
            return $this->instagram_url;
        }
        
        return null;
    }

    // Get main action text
    public function getMainActionTextAttribute()
    {
        if ($this->status === 'live' && $this->youtube_url) {
            return 'LIVE';
        }
        
        if ($this->instagram_url) {
            return 'IG';
        }
        
        if ($this->is_tba) {
            return 'TBA';
        }
        
        return 'INFO';
    }

    // Get main action icon
    public function getMainActionIconAttribute()
    {
        if ($this->status === 'live' && $this->youtube_url) {
            return 'fas fa-play';
        }
        
        if ($this->instagram_url) {
            return 'fab fa-instagram';
        }
        
        return 'fas fa-info-circle';
    }
}