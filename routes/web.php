<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str; // ADD THIS IMPORT
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Models\Event;
use App\Models\Gallery; // ADD THIS IMPORT

// Home - Main scrolling page with all sections
Route::get('/', [HomeController::class, 'index'])->name('home');

// Members
Route::get('/members', [MemberController::class, 'index'])->name('members.index');
Route::get('/members/{member}', [MemberController::class, 'show'])->name('members.show');

// News
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news:slug}', [NewsController::class, 'show'])->name('news.show');

// Events
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

// Gallery routes
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery/{gallery}', [GalleryController::class, 'show'])->name('gallery.show');
Route::get('/gallery/{gallery}/download', [GalleryController::class, 'download'])->name('gallery.download');

// API Routes for AJAX requests
Route::prefix('api')->group(function () {
    // Event detail API for modal
    Route::get('/events/{event}', function(Event $event) {
        return response()->json([
            'id' => $event->id,
            'event_name' => $event->event_name,
            'location' => $event->location,
            'formatted_date' => $event->formatted_date,
            'description' => $event->description,
            'ticket_url' => $event->ticket_url,
            'status' => $event->status,
            'status_text' => $event->status_text,
            'event_date' => $event->event_date?->format('Y-m-d'),
        ]);
    })->name('api.events.show');
    
    // Gallery API
    Route::get('/gallery', [GalleryController::class, 'getGalleryData'])->name('api.gallery.index');
    Route::get('/gallery/category/{category}', [GalleryController::class, 'getByCategory'])->name('api.gallery.category');
    Route::get('/gallery/{gallery}', function(Gallery $gallery) {
        return response()->json([
            'id' => $gallery->id,
            'title' => $gallery->title,
            'description' => $gallery->description,
            'image_url' => $gallery->image_url,
            'thumbnail_url' => $gallery->thumbnail_url,
            'category' => $gallery->category,
            'category_label' => $gallery->category_label,
            'formatted_taken_date' => $gallery->formatted_taken_date,
            'photographer' => $gallery->photographer,
            'tags' => $gallery->tags
        ]);
    })->name('api.gallery.show');
    
    // Members API (untuk future use)
    Route::get('/members/{member}', function($member) {
        return response()->json([
            'message' => 'Member API endpoint',
            'member_id' => $member
        ]);
    })->name('api.members.show');
});

// Section-specific routes (untuk direct access ke section tertentu)
Route::prefix('sections')->group(function () {
    Route::get('/home', function() {
        return redirect('/#home');
    })->name('sections.home');
    
    Route::get('/about', function() {
        return redirect('/#about');
    })->name('sections.about');
    
    Route::get('/news', function() {
        return redirect('/#news');
    })->name('sections.news');
    
    Route::get('/gallery', function() {
        return redirect('/#gallery');
    })->name('sections.gallery');
    
    Route::get('/music', function() {
        return redirect('/#music');
    })->name('sections.music');
    
    Route::get('/schedule', function() {
        return redirect('/#schedule');
    })->name('sections.schedule');
    
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
    
    // Event management
    Route::resource('events', 'App\Http\Controllers\Admin\EventController');
    
    // Member management
    Route::resource('members', 'App\Http\Controllers\Admin\MemberController');
    
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