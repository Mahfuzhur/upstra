<a href="{{ route('blog.show', $post) }}" class="group block">
  @include('partials.ph', ['src' => img($post->image), 'class' => 'w-full aspect-[16/10]'])
  <p class="text-xs text-ink/70 mt-4">{{ $post->author }} | {{ $post->published_at?->format('d M Y') }}</p>
  <div class="flex items-start justify-between gap-3 mt-2">
    <h3 class="font-head font-bold text-xl leading-snug group-hover:text-brand">{{ $post->title }}</h3>
    <span class="text-brand">↗</span>
  </div>
  <p class="text-sm text-ink/80 mt-2">{{ \Illuminate\Support\Str::limit($post->excerpt, 150) }}</p>
</a>
