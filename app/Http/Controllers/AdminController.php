<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'bookings'         => Schema::hasTable('bookings') ? Booking::count() : 0,
            'users'            => User::count(),
            'today_departures' => 6,
            'revenue'          => '$24,800',
        ];

        $bookings = Schema::hasTable('bookings')
            ? Booking::latest()->take(8)->get()
            : collect();

        $users = User::latest()->take(8)->get();

        return view('admin.dashboard', compact('stats', 'bookings', 'users'));
    }

    public function bookings()
    {
        $bookings = Schema::hasTable('bookings')
            ? Booking::latest()->paginate(15)
            : collect()->paginate(15);

        return view('admin.bookings', compact('bookings'));
    }

    public function users()
    {
        $users = User::latest()->paginate(15);
        return view('admin.users', compact('users'));
    }

    public function makeAdmin(User $user)
    {
        $user->update(['is_admin' => true]);
        return back()->with('status', "{$user->name} is now an admin.");
    }

    public function removeAdmin(User $user)
    {
        $user->update(['is_admin' => false]);
        return back()->with('status', "Admin privileges removed from {$user->name}.");
    }

    public function deleteUser(User $user)
    {
        if (auth()->id() === $user->id) {
            return back()->with('error', 'You cannot delete your own account.');
        }
        $user->delete();
        return back()->with('status', 'User deleted.');
    }
}
