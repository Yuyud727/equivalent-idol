<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // ADD THIS IMPORT
use App\Models\Member;

class GalleryController extends Controller
{
    /**
     * Display a listing of the gallery.
     */
    public function index(Request $request)
    {
        $query = Gallery::active()->ordered();
        
        // Filter by category if provided
        if ($request->has('category') && $request->category !== 'all') {
            $query->byCategory($request->category);
        }
        
        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhereJsonContains('tags', $search);
            });
        }
        
        $galleries = $query->paginate(12);
        
        // Get all categories for filter
        $categories = Gallery::active()
            ->select('category')
            ->distinct()
            ->pluck('category')
            ->map(function($category) {
                return [
                    'value' => $category,
                    'label' => Gallery::getCategoryLabels()[$category] ?? ucfirst($category)
                ];
            });
        
        return view('gallery.index', compact('galleries', 'categories'));
    }

    /**
     * Display the specified gallery item.
     */
    public function show(Gallery $gallery)
    {
        // Check if gallery is active
        if (!$gallery->is_active) {
            abort(404);
        }
        
        // Get related galleries (same category)
        $relatedGalleries = Gallery::active()
            ->where('category', $gallery->category)
            ->where('id', '!=', $gallery->id)
            ->ordered()
            ->take(6)
            ->get();
        
        // Get previous and next gallery for navigation
        $previousGallery = Gallery::active()
            ->where('order', '<', $gallery->order)
            ->orderBy('order', 'desc')
            ->first();
            
        $nextGallery = Gallery::active()
            ->where('order', '>', $gallery->order)
            ->orderBy('order', 'asc')
            ->first();
        
        return view('gallery.show', compact('gallery', 'relatedGalleries', 'previousGallery', 'nextGallery'));
    }

    /**
     * Get gallery data as JSON for AJAX requests
     */
    public function getGalleryData(Request $request)
    {
        $galleries = Gallery::featured()->active()->ordered()->get();
        
        $data = $galleries->map(function($gallery) {
            return [
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
            ];
        });
        
        return response()->json($data);
    }

    /**
     * Get gallery by category
     */
    public function getByCategory($category)
    {
        $galleries = Gallery::active()
            ->byCategory($category)
            ->ordered()
            ->get()
            ->map(function($gallery) {
                return [
                    'id' => $gallery->id,
                    'title' => $gallery->title,
                    'description' => $gallery->description,
                    'image_url' => $gallery->image_url,
                    'thumbnail_url' => $gallery->thumbnail_url,
                    'category_label' => $gallery->category_label,
                    'formatted_taken_date' => $gallery->formatted_taken_date,
                    'photographer' => $gallery->photographer
                ];
            });
        
        return response()->json($galleries);
    }

    /**
     * Download gallery image
     */
    public function download(Gallery $gallery)
    {
        if (!$gallery->is_active) {
            abort(404);
        }
        
        $filePath = storage_path('app/public/' . $gallery->image_path);
        
        if (!file_exists($filePath)) {
            abort(404, 'File not found');
        }
        
        $fileName = 'equivalent-' . Str::slug($gallery->title) . '.jpg';
        
        return response()->download($filePath, $fileName);
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