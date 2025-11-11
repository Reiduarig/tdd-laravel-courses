<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class PageHomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $courses = Course::query()
            ->whereNotNull('release_at')
            ->orderBy('release_at')
            ->get();
        return view('home', compact('courses'));
    }
}
