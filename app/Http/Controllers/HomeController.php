<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ChatMessage;
use App\Models\Medium;
use App\Models\PageVisit;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $stats = [
            'users' => User::count(),
            'usersThisWeek' => User::where('created_at', '>=', now()->startOfWeek())->count(),
            'messages' => ChatMessage::count(),
            'media' => Medium::count(),
            'pageViews' => PageVisit::count(),
            'viewsToday' => PageVisit::whereDate('visited_at', today())->count(),
            'messagesThisWeek' => ChatMessage::where('created_at', '>=', now()->startOfWeek())->count(),
            'mediaThisMonth' => Medium::where('created_at', '>=', now()->startOfMonth())->count(),
        ];

        // Chart data - Page views last 7 days
        $viewsPerDay = PageVisit::select(
            DB::raw('DATE(visited_at) as date'),
            DB::raw('COUNT(*) as count')
        )
            ->where('visited_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date')
            ->toArray();

        $chartLabels = [];
        $chartData = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $chartLabels[] = now()->subDays($i)->format('D');
            $chartData[] = isset($viewsPerDay[$date]) ? $viewsPerDay[$date]['count'] : 0;
        }

        // New users per day last 7 days
        $usersPerDay = User::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(*) as count')
        )
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date')
            ->toArray();

        $userChartData = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $userChartData[] = isset($usersPerDay[$date]) ? $usersPerDay[$date]['count'] : 0;
        }

        return view('pages.dashboard', compact('stats', 'chartLabels', 'chartData', 'userChartData'));
    }
}