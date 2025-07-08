<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log; // ADD THIS IMPORT
use App\Models\Member; // For Member model in getTaggedMembersAttribute
use Illuminate\Support\Str;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_path',
        'thumbnail_path',
        'category',
        'tags',
        'order',
        'is_featured',
        'is_active',
        'taken_date',
        'photographer',
        'members_tagged'
    ];

    protected $casts = [
        'tags' => 'array',
        'members_tagged' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'taken_date' => 'date'
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('created_at', 'desc');
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    // Accessors - FINAL FIXED VERSION
    public function getImageUrlAttribute()
    {
        if ($this->image_path) {
            try {
                if (Storage::disk('public')->exists($this->image_path)) {
                    return Storage::disk('public')->url($this->image_path);
                }
            } catch (\Exception $e) {
                Log::error('Gallery image path error: ' . $e->getMessage());
            }
        }
        
        return asset('images/placeholder/gallery-placeholder.jpg');
    }

    public function getThumbnailUrlAttribute()
    {
        if ($this->thumbnail_path) {
            try {
                if (Storage::disk('public')->exists($this->thumbnail_path)) {
                    return Storage::disk('public')->url($this->thumbnail_path);
                }
            } catch (\Exception $e) {
                Log::error('Gallery thumbnail path error: ' . $e->getMessage());
            }
        }
        
        // Fallback ke main image jika thumbnail tidak ada
        return $this->image_url;
    }

    public function getFormattedTakenDateAttribute()
    {
        if ($this->taken_date) {
            $months = [
                1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
                5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
                9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
            ];

            $day = $this->taken_date->format('d');
            $month = $months[(int)$this->taken_date->format('m')];
            $year = $this->taken_date->format('Y');
            
            return "{$day} {$month} {$year}";
        }
        return null;
    }

    public function getCategoryLabelAttribute()
    {
        $labels = [
            'photoshoot' => 'Photoshoot',
            'performance' => 'Performance',
            'behind-scenes' => 'Behind The Scenes',
            'event' => 'Event',
            'casual' => 'Casual',
            'group' => 'Group Photo',
            'individual' => 'Individual'
        ];

        return $labels[$this->category] ?? 'Gallery';
    }

    // Relationships
    public function getTaggedMembersAttribute()
    {
        if ($this->members_tagged && is_array($this->members_tagged)) {
            return Member::whereIn('id', $this->members_tagged)->get();
        }
        return collect();
    }

    /**
     * Get category labels (static method)
     */
    public static function getCategoryLabels()
    {
        return [
            'photoshoot' => 'Photoshoot',
            'performance' => 'Performance',
            'behind-scenes' => 'Behind The Scenes',
            'event' => 'Event',
            'casual' => 'Casual',
            'group' => 'Group Photo',
            'individual' => 'Individual'
        ];
    }
}