<?php

namespace App\Http\Controllers;

use App\Models\DetailMember;
use App\Models\Schedule;
use App\Models\OtsukarePosts;
use App\Models\Gallery;
use App\Models\News;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $data = [
                // Members - menggunakan DetailMember yang baru
                'members' => $this->getMembers(),
                
                // News - tetap menggunakan model News existing
                'latestNews' => $this->getLatestNews(),
                
                // Events - menggunakan Schedule table yang baru
                'events' => $this->getEvents(),
                
                // Schedule Events - untuk section schedule di home page
                'scheduleEvents' => $this->getScheduleEvents(),
                
                // Featured Events - untuk highlights
                'featuredEvents' => $this->getFeaturedEvents(),
                
                // Live Events - untuk notifikasi live
                'liveEvents' => $this->getLiveEvents(),
                
                // Activities - menggunakan OtsukarePosts yang baru
                'activities' => $this->getActivities(),
                
                // Gallery - tetap menggunakan model Gallery existing
                'galleries' => $this->getGalleryImages(),
                
                // Featured Gallery - untuk gallery section
                'featuredGallery' => $this->getFeaturedGallery(),
                
                // Upcoming Events - dari Schedule
                'upcomingEvents' => $this->getUpcomingEvents(),
                
                // Social Media - tetap menggunakan model existing
                'socialMedia' => $this->getSocialMedia(),
                
                // Statistics
                'statistics' => $this->getStatistics()
            ];

            // Debug - comment/uncomment untuk test
            Log::info('HomeController data loaded successfully', [
                'members_count' => $data['members']->count(),
                'events_count' => $data['events']->count(),
                'schedule_events_count' => $data['scheduleEvents']->count(),
                'activities_count' => $data['activities']->count()
            ]);

            return view('home', $data);
            
        } catch (\Exception $e) {
            // Enhanced error handling
            Log::error('HomeController error: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            
            // Fallback data dengan struktur yang konsisten
            $data = [
                'members' => collect(),
                'latestNews' => collect(),
                'events' => collect(),
                'scheduleEvents' => collect(),
                'featuredEvents' => collect(),
                'liveEvents' => collect(),
                'activities' => collect(),
                'galleries' => collect(),
                'featuredGallery' => collect(),
                'upcomingEvents' => collect(),
                'socialMedia' => collect(),
                'statistics' => $this->getDefaultStatistics()
            ];
            
            return view('home', $data)->with('error', 'Some data could not be loaded. Please try again later.');
        }
    }

    /**
     * Get members with error handling
     */
    private function getMembers()
    {
        try {
            $members = DetailMember::ordered()->get();
            Log::info('Members loaded: ' . $members->count());
            return $members;
        } catch (QueryException $e) {
            Log::error('DetailMember query error: ' . $e->getMessage());
            return collect();
        } catch (\Exception $e) {
            Log::error('DetailMember general error: ' . $e->getMessage());
            return collect();
        }
    }

    /**
     * Get events with error handling (legacy)
     */
    private function getEvents()
    {
        try {
            // Check if table exists first
            if (\Schema::hasTable('schedule')) {
                return Schedule::orderBy('event_date')
                    ->take(5)
                    ->get();
            }
        } catch (QueryException $e) {
            Log::warning('Schedule table query error: ' . $e->getMessage());
        } catch (\Exception $e) {
            Log::warning('Schedule general error: ' . $e->getMessage());
        }
        
        return collect();
    }

    /**
     * Get schedule events for schedule section (NEW)
     */
    private function getScheduleEvents()
    {
        try {
            if (\Schema::hasTable('schedule')) {
                return Schedule::orderBy('row_number')
                    ->orderBy('event_date')
                    ->limit(8) // Limit untuk home page
                    ->get();
            }
        } catch (QueryException $e) {
            Log::warning('Schedule events query error: ' . $e->getMessage());
        } catch (\Exception $e) {
            Log::warning('Schedule events general error: ' . $e->getMessage());
        }
        
        return collect();
    }

    /**
     * Get featured events for highlights (NEW)
     */
    private function getFeaturedEvents()
    {
        try {
            if (\Schema::hasTable('schedule')) {
                return Schedule::where('is_featured', true)
                    ->where('event_date', '>=', now())
                    ->orderBy('event_date')
                    ->limit(3)
                    ->get();
            }
        } catch (\Exception $e) {
            Log::warning('Featured events error: ' . $e->getMessage());
        }
        
        return collect();
    }

    /**
     * Get live events (NEW)
     */
    private function getLiveEvents()
    {
        try {
            if (\Schema::hasTable('schedule')) {
                return Schedule::where('status', 'live')
                    ->orderBy('event_date')
                    ->get();
            }
        } catch (\Exception $e) {
            Log::warning('Live events error: ' . $e->getMessage());
        }
        
        return collect();
    }

    /**
     * Get upcoming events
     */
    private function getUpcomingEvents()
    {
        try {
            if (\Schema::hasTable('schedule')) {
                return Schedule::where('event_date', '>=', now())
                    ->orderBy('event_date')
                    ->take(3)
                    ->get();
            }
        } catch (\Exception $e) {
            Log::warning('Upcoming events error: ' . $e->getMessage());
        }
        
        return collect();
    }

    /**
     * Get activities with error handling
     */
    private function getActivities()
    {
        try {
            if (\Schema::hasTable('otsukare_posts')) {
                return OtsukarePosts::with('documentations')
                    ->orderBy('activity_date', 'desc')
                    ->take(6)
                    ->get();
            }
        } catch (\Exception $e) {
            Log::warning('Activities error: ' . $e->getMessage());
        }
        
        return collect();
    }

    /**
     * Get latest news with error handling
     */
    private function getLatestNews()
    {
        try {
            if (\Schema::hasTable('news')) {
                // Check if News model has published scope
                if (method_exists(News::class, 'scopePublished')) {
                    return News::published()->latest()->take(3)->get();
                } else {
                    return News::latest()->take(3)->get();
                }
            }
        } catch (\Exception $e) {
            Log::warning('News model error: ' . $e->getMessage());
        }
        
        return collect();
    }

    /**
     * Get gallery images with error handling
     */
    private function getGalleryImages()
    {
        try {
            if (\Schema::hasTable('galleries')) {
                // Check for available methods and columns
                $query = Gallery::query();
                
                if (\Schema::hasColumn('galleries', 'is_featured')) {
                    $query->where('is_featured', true);
                }
                
                if (\Schema::hasColumn('galleries', 'order_number')) {
                    $query->orderBy('order_number');
                } else {
                    $query->latest();
                }
                
                return $query->take(5)->get();
            }
        } catch (\Exception $e) {
            Log::warning('Gallery model error: ' . $e->getMessage());
        }
        
        return collect();
    }

    /**
     * Get featured gallery for gallery section
     */
    private function getFeaturedGallery()
    {
        try {
            if (\Schema::hasTable('galleries')) {
                $query = Gallery::query();
                
                if (\Schema::hasColumn('galleries', 'is_featured')) {
                    $query->where('is_featured', true);
                }
                
                if (\Schema::hasColumn('galleries', 'order_number')) {
                    $query->orderBy('order_number');
                } else {
                    $query->latest();
                }
                
                return $query->take(6)->get();
            }
        } catch (\Exception $e) {
            Log::warning('Featured gallery error: ' . $e->getMessage());
        }
        
        return collect();
    }

    /**
     * Get social media with error handling
     */
    private function getSocialMedia()
    {
        try {
            if (\Schema::hasTable('social_media')) {
                $query = SocialMedia::query();
                
                if (\Schema::hasColumn('social_media', 'is_active')) {
                    $query->where('is_active', true);
                }
                
                if (\Schema::hasColumn('social_media', 'order')) {
                    $query->orderBy('order');
                } else {
                    $query->orderBy('id');
                }
                
                return $query->get();
            }
        } catch (\Exception $e) {
            Log::warning('SocialMedia model error: ' . $e->getMessage());
        }
        
        return collect();
    }

    /**
     * Get statistics for dashboard/about section
     */
    public function getStatistics()
    {
        try {
            $stats = [];
            
            // Count members
            try {
                $stats['total_members'] = DetailMember::count();
            } catch (\Exception $e) {
                $stats['total_members'] = 0;
            }
            
            // Count events
            try {
                $stats['total_events'] = \Schema::hasTable('schedule') ? Schedule::count() : 0;
            } catch (\Exception $e) {
                $stats['total_events'] = 0;
            }
            
            // Count activities
            try {
                $stats['total_activities'] = \Schema::hasTable('otsukare_posts') ? OtsukarePosts::count() : 0;
            } catch (\Exception $e) {
                $stats['total_activities'] = 0;
            }
            
            // Count gallery
            try {
                $stats['total_gallery'] = \Schema::hasTable('galleries') ? Gallery::count() : 0;
            } catch (\Exception $e) {
                $stats['total_gallery'] = 0;
            }
            
            // Count upcoming events
            try {
                $stats['upcoming_events'] = \Schema::hasTable('schedule') ? 
                    Schedule::where('event_date', '>=', now())->count() : 0;
            } catch (\Exception $e) {
                $stats['upcoming_events'] = 0;
            }
            
            // Count recent activities
            try {
                $stats['recent_activities'] = \Schema::hasTable('otsukare_posts') ? 
                    OtsukarePosts::where('activity_date', '>=', now()->subDays(30))->count() : 0;
            } catch (\Exception $e) {
                $stats['recent_activities'] = 0;
            }
            
            // Count live events (NEW)
            try {
                $stats['live_events'] = \Schema::hasTable('schedule') ?
                    Schedule::where('status', 'live')->count() : 0;
            } catch (\Exception $e) {
                $stats['live_events'] = 0;
            }
            
            return $stats;
            
        } catch (\Exception $e) {
            Log::error('Statistics error: ' . $e->getMessage());
            return $this->getDefaultStatistics();
        }
    }

    /**
     * Get default statistics when error occurs
     */
    private function getDefaultStatistics()
    {
        return [
            'total_members' => 0,
            'total_events' => 0,
            'total_activities' => 0,
            'total_gallery' => 0,
            'upcoming_events' => 0,
            'recent_activities' => 0,
            'live_events' => 0,
        ];
    }

    /**
     * API endpoint for getting members data
     */
    public function getMembersApi()
    {
        try {
            $members = DetailMember::ordered()->get();
            return response()->json([
                'success' => true,
                'data' => $members,
                'count' => $members->count()
            ]);
        } catch (\Exception $e) {
            Log::error('Members API error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to load members data',
                'data' => [],
                'count' => 0
            ], 500);
        }
    }

    /**
     * API method for getting schedule data via AJAX (NEW)
     */
    public function getScheduleData()
    {
        try {
            if (!\Schema::hasTable('schedule')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Schedule table not found',
                    'data' => []
                ], 404);
            }

            $events = Schedule::orderBy('row_number')
                ->orderBy('event_date')
                ->get()
                ->map(function($event) {
                    return [
                        'id' => $event->id,
                        'row_number' => $event->row_number,
                        'event_name' => $event->event_name,
                        'location' => $event->location,
                        'formatted_date' => $event->formatted_date,
                        'detailed_formatted_date' => $event->detailed_formatted_date,
                        'description' => $event->description,
                        'instagram_url' => $event->instagram_url,
                        'youtube_url' => $event->youtube_url,
                        'status' => $event->status,
                        'status_text' => $event->status_text,
                        'status_icon' => $event->status_icon,
                        'event_type' => $event->event_type,
                        'event_type_label' => $event->event_type_label,
                        'is_featured' => $event->is_featured,
                        'is_live' => $event->is_live,
                        'is_available' => $event->is_available,
                        'is_tba' => $event->is_tba,
                        'is_upcoming' => $event->is_upcoming,
                        'time_until_event' => $event->time_until_event,
                        'main_action_url' => $event->main_action_url,
                        'main_action_text' => $event->main_action_text,
                        'main_action_icon' => $event->main_action_icon,
                        'event_date' => $event->event_date?->format('Y-m-d H:i:s'),
                    ];
                });

            return response()->json([
                'success' => true,
                'data' => $events,
                'count' => $events->count()
            ]);

        } catch (\Exception $e) {
            Log::error('Schedule API error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to load schedule data',
                'data' => [],
                'count' => 0
            ], 500);
        }
    }

    /**
     * Get featured events for home page highlights (NEW)
     */
    public function getFeaturedEventsApi()
    {
        try {
            if (!\Schema::hasTable('schedule')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Schedule table not found',
                    'data' => []
                ], 404);
            }

            $events = Schedule::where('is_featured', true)
                ->where('event_date', '>=', now())
                ->orderBy('event_date')
                ->limit(3)
                ->get();

            return response()->json([
                'success' => true,
                'data' => $events,
                'count' => $events->count()
            ]);

        } catch (\Exception $e) {
            Log::error('Featured events API error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to load featured events',
                'data' => [],
                'count' => 0
            ], 500);
        }
    }

    /**
     * Get live events (NEW)
     */
    public function getLiveEventsApi()
    {
        try {
            if (!\Schema::hasTable('schedule')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Schedule table not found',
                    'data' => []
                ], 404);
            }

            $events = Schedule::where('status', 'live')
                ->orderBy('event_date')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $events,
                'count' => $events->count()
            ]);

        } catch (\Exception $e) {
            Log::error('Live events API error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to load live events',
                'data' => [],
                'count' => 0
            ], 500);
        }
    }
}