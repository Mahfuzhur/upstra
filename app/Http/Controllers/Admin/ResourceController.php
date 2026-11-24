<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ResourceController extends Controller
{
    protected function cfg($res, $write = false)
    {
        $c = config("cms.resources.$res");
        abort_unless($c, 404);
        abort_if($write && ($c['readonly'] ?? false), 404);
        $c['key'] = $res;
        return $c;
    }

    public function index($res)
    {
        $c = $this->cfg($res);
        [$col, $dir] = $c['order'] ?? ['id', 'desc'];
        $rows = $c['model']::orderBy($col, $dir)->paginate(20);
        return view('admin.index', compact('c', 'rows'));
    }

    public function create($res)
    {
        $c = $this->cfg($res, true);
        return view('admin.form', ['c' => $c, 'item' => new $c['model']]);
    }

    public function store(Request $r, $res)
    {
        $c = $this->cfg($res, true);
        $c['model']::create($this->data($r, $c));
        return redirect()->route('admin.res.index', $res)->with('ok', 'Saved.');
    }

    public function show($res, $id)
    {
        $c = $this->cfg($res);
        return view('admin.show', ['c' => $c, 'item' => $c['model']::findOrFail($id)]);
    }

    public function edit($res, $id)
    {
        $c = $this->cfg($res, true);
        return view('admin.form', ['c' => $c, 'item' => $c['model']::findOrFail($id)]);
    }

    public function update(Request $r, $res, $id)
    {
        $c = $this->cfg($res, true);
        $item = $c['model']::findOrFail($id);
        $item->update($this->data($r, $c, $item));
        return redirect()->route('admin.res.index', $res)->with('ok', 'Saved.');
    }

    public function destroy($res, $id)
    {
        $c = $this->cfg($res);
        $c['model']::findOrFail($id)->delete();
        return back()->with('ok', 'Deleted.');
    }

    protected function data(Request $r, array $c, $item = null): array
    {
        $rules = [];
        $first = true;
        foreach ($c['fields'] as $k => [$label, $type]) {
            $rules[$k] = match ($type) {
                'date' => 'nullable|date',
                'image' => 'nullable|image|max:4096',
                'file' => 'nullable|file|max:10240',
                'number' => 'nullable|integer',
                'checkbox' => 'boolean',
                default => ($first ? 'required' : 'nullable') . '|string' . ($type === 'text' ? '|max:255' : ''),
            };
            $first = false;
        }
        $r->validate($rules);

        $data = [];
        foreach ($c['fields'] as $k => [$label, $type]) {
            if (in_array($type, ['image', 'file'])) {
                if ($r->hasFile($k)) $data[$k] = $r->file($k)->store('uploads', 'public');
            } elseif ($type === 'checkbox') {
                $data[$k] = $r->boolean($k);
            } elseif ($type === 'number') {
                $data[$k] = (int) $r->input($k, 0);
            } else {
                $data[$k] = $r->input($k);
            }
        }

        if (!empty($c['slug']) && !$item) {
            $base = Str::slug($data[$c['slug']]) ?: Str::lower(Str::random(6));
            $slug = $base; $i = 2;
            while ($c['model']::where('slug', $slug)->exists()) $slug = $base . '-' . $i++;
            $data['slug'] = $slug;
        }
        return $data;
    }
}
