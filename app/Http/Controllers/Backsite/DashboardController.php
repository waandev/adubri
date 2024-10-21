<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Complaint;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            'auth',
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalUser = User::count();
        $totalService = Service::count();
        $totalComplaint = Complaint::count();
        $totalAnswered = Complaint::has('feedback')->count();
        $totalUnanswered = Complaint::doesntHave('feedback')->count();
        $categories = Category::withCount('complaints')->get();

        $latestComplaints = Complaint::latest()->take(5)->get();

        return view('pages.backsite.dashboard.index', compact('totalUser', 'totalService', 'totalComplaint', 'totalAnswered', 'totalUnanswered', 'categories', 'latestComplaints'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort(404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        abort(404);
    }

    public function getComplaintData()
    {
        // For daily data
        $dailyComplaints = Complaint::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->get();

        // For weekly data
        $weeklyComplaints = Complaint::selectRaw('WEEK(created_at) as week, COUNT(*) as total')
            ->groupBy('week')
            ->get();

        // For monthly data
        $monthlyComplaints = Complaint::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->get();

        return response()->json([
            'daily' => $dailyComplaints,
            'weekly' => $weeklyComplaints,
            'monthly' => $monthlyComplaints
        ]);
    }
}
