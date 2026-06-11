<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageVisit;
use App\Models\User;
use App\Models\ChatMessage;
use App\Models\Medium;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function index()
    {
        // Total counts
        $totalUsers = User::count();
        $totalMessages = ChatMessage::count();
        $totalMedia = Medium::count();
        $totalVisits = PageVisit::count();

        // Users this week
        $usersThisWeek = User::where('created_at', '>=', now()->startOfWeek())->count();

        // Page views today
        $viewsToday = PageVisit::whereDate('visited_at', today())->count();

        // Page views per day (last 14 days)
        $viewsPerDay = PageVisit::select(
            DB::raw('DATE(visited_at) as date'),
            DB::raw('COUNT(*) as count')
        )
            ->where('visited_at', '>=', now()->subDays(14))
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date')
            ->toArray();

        // Fill in missing days with zero
        $chartLabels = [];
        $chartData = [];
        for ($i = 13; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $chartLabels[] = now()->subDays($i)->format('M d');
            $chartData[] = isset($viewsPerDay[$date]) ? $viewsPerDay[$date]['count'] : 0;
        }

        // Messages per day (last 14 days)
        $messagesPerDay = ChatMessage::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(*) as count')
        )
            ->where('created_at', '>=', now()->subDays(14))
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date')
            ->toArray();

        $msgChartData = [];
        for ($i = 13; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $msgChartData[] = isset($messagesPerDay[$date]) ? $messagesPerDay[$date]['count'] : 0;
        }

        // Most visited pages
        $topPages = PageVisit::select('url', DB::raw('COUNT(*) as count'))
            ->groupBy('url')
            ->orderBy('count', 'desc')
            ->limit(10)
            ->get();

        // Unique visitors today & this week
        $uniqueToday = PageVisit::whereDate('visited_at', today())
            ->distinct('ip_address')
            ->count('ip_address');

        $uniqueThisWeek = PageVisit::where('visited_at', '>=', now()->startOfWeek())
            ->distinct('ip_address')
            ->count('ip_address');

        return view('pages.analytics', compact(
            'totalUsers',
            'totalMessages',
            'totalMedia',
            'totalVisits',
            'usersThisWeek',
            'viewsToday',
            'chartLabels',
            'chartData',
            'msgChartData',
            'topPages',
            'uniqueToday',
            'uniqueThisWeek'
        ));
    }
}