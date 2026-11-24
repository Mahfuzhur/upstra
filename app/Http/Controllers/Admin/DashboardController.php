<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $counts = [];
        foreach (config('cms.resources') as $key => $c) {
            $counts[$key] = $c['model']::count();
        }
        return view('admin.dashboard', compact('counts'));
    }

    public function resume($id)
    {
        $a = Application::findOrFail($id);
        abort_unless($a->resume && Storage::exists($a->resume), 404);
        return Storage::download($a->resume, $a->first_name . '-' . $a->last_name . '-resume.' . pathinfo($a->resume, PATHINFO_EXTENSION));
    }
}
