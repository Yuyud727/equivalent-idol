<?php
// ===============================================
// ACTIVITIESCONTROLLER (NEW)
// ===============================================

namespace App\Http\Controllers;

use App\Models\OtsukarePosts;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category', 'all');
        $perPage = 6;

        $activities = OtsukarePosts::with('documentations')
            ->byCategory($category)
            ->orderBy('activity_date', 'desc')
            ->paginate($perPage);

        if ($request->ajax()) {
            return view('partials.activities-list', compact('activities'))->render();
        }

        return view('activities.index', compact('activities', 'category'));
    }

    public function show($id)
    {
        $activity = OtsukarePosts::with('documentations')->findOrFail($id);
        $activity->incrementViewCount();

        return response()->json([
            'id' => $activity->id,
            'title' => $activity->title,
            'description' => $activity->description,
            'category' => $activity->category,
            'location' => $activity->location,
            'activity_date' => $activity->activity_date->format('F d, Y \a\t g:i A'),
            'member_names' => $activity->member_names,
            'view_count' => $activity->view_count,
            'documentations' => $activity->documentations->map(function($doc) {
                return [
                    'image_path' => $doc->image_path,
                    'caption' => $doc->caption,
                    'order_number' => $doc->order_number
                ];
            })->sortBy('order_number')->values()
        ]);
    }

    public function loadMore(Request $request)
    {
        $page = $request->get('page', 2);
        $category = $request->get('category', 'all');
        $perPage = 3;

        $activities = OtsukarePosts::with('documentations')
            ->byCategory($category)
            ->orderBy('activity_date', 'desc')
            ->skip(($page - 1) * $perPage)
            ->take($perPage)
            ->get();

        return response()->json([
            'activities' => $activities->map(function($activity) {
                return [
                    'id' => $activity->id,
                    'title' => $activity->title,
                    'description' => $activity->description,
                    'category' => $activity->category,
                    'thumbnail' => $activity->thumbnail,
                    'location' => $activity->location,
                    'activity_date' => $activity->activity_date,
                    'member_ids' => $activity->member_ids,
                    'view_count' => $activity->view_count,
                    'documentations_count' => $activity->documentations_count
                ];
            }),
            'hasMore' => $activities->count() === $perPage
        ]);
    }
}