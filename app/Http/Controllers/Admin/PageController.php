<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected function page($page)
    {
        $p = config("cms.pages.$page");
        abort_unless($p, 404);
        return $p;
    }

    public function edit($page)
    {
        $p = $this->page($page);
        $stored = Content::where('key', 'like', "$page.%")->pluck('value', 'key');
        return view('admin.page', compact('page', 'p', 'stored'));
    }

    public function update(Request $r, $page)
    {
        $p = $this->page($page);
        $rules = [];
        foreach ($p['fields'] as $k => [$label, $type]) {
            if ($type === 'image') $rules["fields.$k"] = 'nullable|image|max:4096';
            elseif ($type === 'file') $rules["fields.$k"] = 'nullable|file|max:10240';
            else $rules["fields.$k"] = 'nullable|string|max:20000';
        }
        $r->validate($rules);

        foreach ($p['fields'] as $k => [$label, $type]) {
            $key = "$page.$k";
            if (in_array($type, ['image', 'file'])) {
                if ($r->hasFile("fields.$k")) {
                    Content::updateOrCreate(['key' => $key], ['value' => $r->file("fields.$k")->store('cms', 'public')]);
                } elseif ($r->boolean("remove.$k")) {
                    Content::where('key', $key)->delete();
                }
                continue;
            }
            $val = $r->input("fields.$k");
            if ($val === null || $val === '') Content::where('key', $key)->delete(); // empty = back to default
            else Content::updateOrCreate(['key' => $key], ['value' => $val]);
        }
        return back()->with('ok', 'Saved.');
    }
}
