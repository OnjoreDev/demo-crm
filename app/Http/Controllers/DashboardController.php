<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Interaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // 1. Key Stat Totals
        $stats = [
            'total_customers' => Customer::where('user_id', $user->id)->count(),
            'active_leads'    => Customer::where('user_id', $user->id)->where('status', 'lead')->count(),
            'total_interactions' => Interaction::whereHas('customer', function($q) use ($user) {
                $q->where('user_id', $user->id);
            })->count(),
            'recent_interactions' => Interaction::whereHas('customer', function($q) use ($user) {
                $q->where('user_id', $user->id);
            })->where('interaction_date', '>=', now()->subDays(30))->count(),
        ];

        // 2. Data for Status Chart (Pie Chart)
        $statusDistribution = Customer::where('user_id', $user->id)
            ->selectRaw('status, count(*) as total')
            ->groupBy('status')
            ->get();

        // 3. Recent Interactions for a "Activity Feed"
        $recentActivity = Interaction::with('customer')
            ->whereHas('customer', function($q) use ($user) {
                $q->where('user_id', $user->id);
            })
            ->latest('interaction_date')
            ->take(5)
            ->get();

        return view('dashboard', compact('stats', 'statusDistribution', 'recentActivity'));
    }
}