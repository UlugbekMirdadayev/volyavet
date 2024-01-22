<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RobotsTxtController extends Controller
{
    public function edit()
    {
        $robotsTxtContent = File::get(public_path('robots.txt'));

        return view('admin.robots.edit', compact('robotsTxtContent'));
    }

    public function update(Request $request)
    {
        $content = $request->input('content');

        File::put(public_path('robots.txt'), $content);

        return redirect()->back()->with('success', 'Файл robots.txt успешно обновлен.');
    }
}
