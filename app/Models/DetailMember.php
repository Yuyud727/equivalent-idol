<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;

class DetailMember extends Model
{
    use HasFactory;

    protected $table = 'detail_member';

    protected $fillable = [
        'member_no',
        'name',
        'photo',
        'color',
        'birth_date',
        'jiko'
    ];

    protected $casts = [
        'birth_date' => 'date',
        'member_no' => 'integer'
    ];

    // Scope untuk ordering berdasarkan member_no
    public function scopeOrdered($query)
    {
        return $query->orderBy('member_no');
    }

    // Static method untuk find by member number
    public static function findByNumber($memberNo)
    {
        return static::where('member_no', $memberNo)->first();
    }

    // Accessor untuk photo URL
    protected function photoUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->photo ? asset('storage/' . $this->photo) : null
        );
    }

    // Accessor untuk formatted birth date
    protected function formattedBirthDate(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->birth_date ? $this->birth_date->format('F d, Y') : null
        );
    }

    // Accessor untuk age
    protected function age(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->birth_date ? $this->birth_date->age : null
        );
    }

    // Accessor untuk short jiko
    protected function shortJiko(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->jiko ? \Str::limit($this->jiko, 100) : null
        );
    }

    // Get next member
    public function getNextMemberAttribute()
    {
        return static::where('member_no', '>', $this->member_no)
                    ->orderBy('member_no')
                    ->first();
    }

    // Get previous member  
    public function getPreviousMemberAttribute()
    {
        return static::where('member_no', '<', $this->member_no)
                    ->orderBy('member_no', 'desc')
                    ->first();
    }
}