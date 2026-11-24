@extends('admin.layout')
@section('title', 'Dashboard')
@section('content')
<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
  @foreach(config('cms.resources') as $key => $c)
    <a href="{{ route('admin.res.index', $key) }}" class="bg-white rounded-xl p-5 shadow-sm hover:shadow">
      <p class="text-3xl font-bold text-brand">{{ $counts[$key] ?? 0 }}</p>
      <p class="text-sm text-gray-600 mt-1">{{ $c['label'] }}</p>
    </a>
  @endforeach
</div>
<p class="mt-8 text-sm text-gray-600">Use <b>Page content</b> in the sidebar to edit texts and images on each page. Use <b>Lists</b> for blog posts, job openings, team, clients, portfolio and testimonials.</p>
@endsection
