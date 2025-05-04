<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin.settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', '_method']);

        // Xử lý file logo
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo')->store('uploads', 'public');
            $data['logo'] = $logo;
        }

        // Xử lý file favicon
        if ($request->hasFile('favicon')) {
            $favicon = $request->file('favicon')->store('uploads', 'public');
            $data['favicon'] = $favicon;
        }

        // Xử lý file og:image
        if ($request->hasFile('og_image')) {
            $ogImage = $request->file('og_image')->store('uploads', 'public');
            $data['og_image'] = $ogImage;
        }

        // Xử lý file twitter:image
        if ($request->hasFile('twitter_image')) {
            $twitterImage = $request->file('twitter_image')->store('uploads', 'public');
            $data['twitter_image'] = $twitterImage;
        }

        // Cập nhật hoặc tạo mới
        $setting = Setting::first();
        if ($setting) {
            $setting->update($data);
        } else {
            Setting::create($data);
        }

        return redirect()->back()->with('success', 'Cập nhật thành công!');
    }
}
