<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\ScheduleController;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\DetailMember;
use App\Models\Schedule;
use App\Models\OtsukarePosts;

// Home - Main scrolling page with all sections
Route::get('/', [HomeController::class, 'index'])->name('home');

// Members routes (updated untuk DetailMember)
Route::prefix('members')->name('members.')->group(function () {
    Route::get('/', [MemberController::class, 'index'])->name('index');
    Route::get('/data', [MemberController::class, 'getAllMembers'])->name('data');
    Route::get('/{memberNo}', [MemberController::class, 'show'])->name('show');
});

// News
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news:slug}', [NewsController::class, 'show'])->name('news.show');

<<<<<<< HEAD
// Tambahkan routes ini ke routes/web.php di bagian API Routes

Route::prefix('api')->group(function () {
    // ... existing API routes ...
    
    // Schedule API Routes (NEW)
    Route::get('/schedule', [HomeController::class, 'getScheduleData'])->name('api.schedule.index');
    Route::get('/schedule/featured', [HomeController::class, 'getFeaturedEventsApi'])->name('api.schedule.featured');
    Route::get('/schedule/live', [HomeController::class, 'getLiveEventsApi'])->name('api.schedule.live');
    
    // Update existing events API route untuk konsistensi
    Route::get('/events/{eventId}', function($eventId) {
        try {
            $event = Schedule::find($eventId);
            
            if (!$event) {
                return response()->json(['error' => 'Event not found'], 404);
            }

            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $event->id,
                    'event_name' => $event->event_name,
                    'location' => $event->location,
                    'formatted_date' => $event->formatted_date,
                    'detailed_formatted_date' => $event->detailed_formatted_date,
                    'description' => $event->description,
                    'instagram_url' => $event->instagram_url,
                    'youtube_url' => $event->youtube_url,
                    'status' => $event->status,
                    'status_text' => $event->status_text,
                    'main_action_url' => $event->main_action_url,
                    'main_action_text' => $event->main_action_text,
                    'event_date' => $event->event_date?->format('Y-m-d H:i:s'),
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to load event details'
            ], 500);
        }
    })->name('api.events.show');
    
    // ... rest of existing API routes ...
=======
// Events/Schedule routes (updated)
Route::prefix('schedule')->name('schedule.')->group(function () {
    Route::get('/', [ScheduleController::class, 'index'])->name('index');
    Route::get('/{id}', [ScheduleController::class, 'show'])->name('show');
>>>>>>> f36e3795efb760ef00dc613c5e664113bc1128e3
});

// Legacy Events route (redirect ke schedule)
Route::get('/events', function() {
    return redirect()->route('schedule.index');
})->name('events.index');

Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

// Activities routes (new - untuk Otsukare)
Route::prefix('activities')->name('activities.')->group(function () {
    Route::get('/', [ActivitiesController::class, 'index'])->name('index');
    Route::get('/load-more', [ActivitiesController::class, 'loadMore'])->name('load-more');
    Route::get('/{id}', [ActivitiesController::class, 'show'])->name('show');
});

// Gallery routes
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery/{gallery}', [GalleryController::class, 'show'])->name('gallery.show');
Route::get('/gallery/{gallery}/download', [GalleryController::class, 'download'])->name('gallery.download');

// API Routes for AJAX requests
Route::prefix('api')->group(function () {
    // Members API (updated untuk DetailMember)
    Route::get('/members', [MemberController::class, 'getAllMembers'])->name('api.members.index');
    Route::get('/members/{memberNo}', function($memberNo) {
        $member = DetailMember::findByNumber($memberNo);
        
        if (!$member) {
            return response()->json(['error' => 'Member not found'], 404);
        }

        return response()->json([
            'id' => $member->id,
            'member_no' => $member->member_no,
            'name' => $member->name,
            'photo' => $member->photo,
            'photo_url' => $member->photo_url,
            'color' => $member->color,
            'birth_date' => $member->birth_date->format('Y-m-d'),
            'formatted_birth_date' => $member->formatted_birth_date,
            'age' => $member->age,
            'jiko' => $member->jiko,
            'short_jiko' => $member->short_jiko
        ]);
    })->name('api.members.show');

    // Schedule/Events API (updated)
    Route::get('/events/{eventId}', function($eventId) {
        $event = Schedule::find($eventId);
        
        if (!$event) {
            return response()->json(['error' => 'Event not found'], 404);
        }

        return response()->json([
            'id' => $event->id,
            'event_name' => $event->event_name,
            'location' => $event->location,
            'formatted_date' => $event->formatted_date,
            'description' => $event->description,
            'instagram_url' => $event->instagram_url,
            'youtube_url' => $event->youtube_url,
            'status' => $event->status,
            'status_text' => $event->status_text,
            'event_date' => $event->event_date?->format('Y-m-d H:i:s'),
        ]);
    })->name('api.events.show');

    // Activities API (new)
    Route::get('/activities/{id}', [ActivitiesController::class, 'show'])->name('api.activities.show');
    Route::get('/activities', function() {
        $activities = OtsukarePosts::with('documentations')
            ->orderBy('activity_date', 'desc')
            ->take(10)
            ->get();

        return response()->json($activities->map(function($activity) {
            return [
                'id' => $activity->id,
                'title' => $activity->title,
                'description' => $activity->description,
                'category' => $activity->category,
                'thumbnail' => $activity->thumbnail,
                'location' => $activity->location,
                'activity_date' => $activity->activity_date,
                'member_names' => $activity->member_names,
                'view_count' => $activity->view_count,
                'documentations_count' => $activity->documentations_count
            ];
        }));
    })->name('api.activities.index');
    
    // Gallery API
    Route::get('/gallery', [GalleryController::class, 'getGalleryData'])->name('api.gallery.index');
    Route::get('/gallery/category/{category}', [GalleryController::class, 'getByCategory'])->name('api.gallery.category');
    Route::get('/gallery/{gallery}', function(Gallery $gallery) {
        return response()->json([
            'id' => $gallery->id,
            'title' => $gallery->title,
            'description' => $gallery->description,
            'image_url' => $gallery->image_url ?? asset('storage/' . $gallery->image_path),
            'thumbnail_url' => $gallery->thumbnail_url ?? asset('storage/' . $gallery->image_path),
            'category' => $gallery->category ?? 'general',
            'category_label' => $gallery->category_label ?? 'General',
            'formatted_taken_date' => $gallery->formatted_taken_date ?? $gallery->created_at->format('M d, Y'),
            'photographer' => $gallery->photographer ?? 'Equivalent Staff',
            'tags' => $gallery->tags ?? []
        ]);
    })->name('api.gallery.show');
});

// Section-specific routes (untuk direct access ke section tertentu)
Route::prefix('sections')->group(function () {
    Route::get('/home', function() {
        return redirect('/#home');
    })->name('sections.home');
    
    Route::get('/about', function() {
        return redirect('/#about');
    })->name('sections.about');
    
    Route::get('/schedule', function() {
        return redirect('/#schedule');
    })->name('sections.schedule');
    
    Route::get('/gallery', function() {
        return redirect('/#gallery');
    })->name('sections.gallery');
    
    Route::get('/music', function() {
        return redirect('/#music');
    })->name('sections.music');
    
    Route::get('/activities', function() {
        return redirect('/#activities');
    })->name('sections.activities');
    
    Route::get('/contact', function() {
        return redirect('/#contact');
    })->name('sections.contact');
});

// Admin routes (untuk future CRUD functionality)
Route::prefix('admin')->middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/', function() {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    // Member management (updated untuk DetailMember)
    Route::resource('members', 'App\Http\Controllers\Admin\DetailMemberController');
    
    // Schedule management (updated)
    Route::resource('schedule', 'App\Http\Controllers\Admin\ScheduleController');
    
    // Activities management (new)
    Route::resource('activities', 'App\Http\Controllers\Admin\ActivitiesController');
    
    // News management
    Route::resource('news', 'App\Http\Controllers\Admin\NewsController');
    
    // Gallery management
    Route::resource('galleries', 'App\Http\Controllers\Admin\GalleryController');
    
    // Social media management
    Route::resource('social-media', 'App\Http\Controllers\Admin\SocialMediaController');
});

// Authentication routes (jika menggunakan Laravel Breeze/Jetstream)
// require __DIR__.'/auth.php';

// Fallback route untuk 404 custom
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});