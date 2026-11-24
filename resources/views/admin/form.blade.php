@extends('admin.layout')
@section('title', ($item->exists ? 'Edit ' : 'Add ') . $c['label'])
@section('content')
<form method="post" enctype="multipart/form-data" class="bg-white rounded-xl shadow-sm p-6 space-y-5"
      action="{{ $item->exists ? route('admin.res.update', [$c['key'], $item->id]) : route('admin.res.store', $c['key']) }}">
  @csrf
  @if($item->exists) @method('PUT') @endif
  @foreach($c['fields'] as $k => [$label, $type])
    @include('admin._field', ['name' => $k, 'label' => $label, 'type' => $type,
      'value' => $item->exists ? $item->$k : ($c['defaults'][$k] ?? null)])
  @endforeach
  <div class="flex gap-3">
    <button class="bg-brand text-white rounded-lg px-6 py-2.5 text-sm font-medium">Save</button>
    <a href="{{ route('admin.res.index', $c['key']) }}" class="px-6 py-2.5 text-sm text-gray-600">Cancel</a>
  </div>
</form>
@endsection
