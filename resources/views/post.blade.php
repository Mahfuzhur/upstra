@extends('layouts.site')
@section('title', $post->title)
@section('content')
<article class="max-w-3xl mx-auto px-5 py-16">
  <a href="{{ route('blog') }}" class="text-sm text-brand">← Back to blog</a>
  <p class="text-xs text-ink/70 mt-6">{{ $post->author }} | {{ $post->published_at?->format('d M Y') }}</p>
  <h1 class="font-head font-bold text-4xl md:text-5xl mt-2">{{ $post->title }}</h1>
  @if($post->image)<img src="{{ img($post->image) }}" alt="" class="w-full rounded-xl mt-8">@endif
  <div class="mt-8 text-ink/80 leading-relaxed space-y-4">@foreach(lines($post->body) as $para)<p>{{ $para }}</p>@endforeach</div>
</article>
@endsection
