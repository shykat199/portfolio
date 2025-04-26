<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    public function index()
    {
        return view('admin.site-setting');
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', 'img', 'about_me1', 'about_me2']);

        foreach ($data as $key => $value) {
            SiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        SiteSetting::updateOrCreate(
            ['key' => 'about_me1'],
            ['value' => $request->about_me1]
        );

        SiteSetting::updateOrCreate(
            ['key' => 'about_me2'],
            ['value' => $request->about_me2]
        );

        if ($request->hasFile('img')) {

            $oldImage = getSettingsData('img');

            if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                Storage::disk('public')->delete($oldImage);
            }

            $file = $request->file('img');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = Storage::disk('public')->putFileAs('setting', $file, $filename);

            SiteSetting::updateOrCreate(
                ['key' => 'img'],
                ['value' => $path ?? null]
            );
        }
        toast('Settings updated successfully!','success');
        return redirect()->back();
    }
}
