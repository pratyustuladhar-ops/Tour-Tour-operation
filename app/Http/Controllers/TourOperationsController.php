<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class TourOperationsController extends Controller
{
    public function index()
    {
        $hasBookingsTable = Schema::hasTable('bookings');

        $stats = [
            'bookings' => $hasBookingsTable ? Booking::count() : 0,
            'today_departures' => 6,
            'occupancy' => '82%',
            'revenue' => '$24,800',
        ];

        $bookings = $hasBookingsTable ? Booking::latest()->take(5)->get() : collect();

        return view('tour-operations.index', compact('stats', 'bookings'));
    }

    public function planner()
    {
        if (!auth()->check()) {
            return redirect()->route('register');
        }

        return view('tour-operations.planner');
    }

    public function dashboard()
    {
        return view('tour-operations.dashboard');
    }

    public function bookings()
    {
        return view('tour-operations.bookings');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tour_name' => ['required', 'string', 'max:255'],
            'guest_name' => ['required', 'string', 'max:255'],
            'guest_email' => ['required', 'email', 'max:255'],
            'guests' => ['required', 'integer', 'min:1'],
            'travel_date' => ['required', 'date'],
            'notes' => ['nullable', 'string'],
        ]);

        Booking::create($validated);

        return redirect('/')->with('status', 'Booking confirmed.');
    }
}
