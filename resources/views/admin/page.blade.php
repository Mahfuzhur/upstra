@extends('admin.layout')
@section('title', $p['label'])
@section('content')
<form method="post" action="{{ route('admin.pages.update', $page) }}" enctype="multipart/form-data" class="bg-white rounded-xl shadow-sm p-6 space-y-5">
  @csrf
  <p class="text-sm text-gray-500">Clear a text field and save to go back to its original text.</p>
  @foreach($p['fields'] as $k => [$label, $type, $default])
    @include('admin._field', [
      'name' => "fields[$k]", 'dot' => "fields.$k", 'label' => $label, 'type' => $type,
      'value' => in_array($type, ['image', 'file']) ? ($stored["$page.$k"] ?? null) : ($stored["$page.$k"] ?? $default),
      'removeName' => "remove[$k]",
    ])
  @endforeach
  <button class="bg-brand text-white rounded-lg px-6 py-2.5 text-sm font-medium">Save changes</button>
</form>
@endsection
