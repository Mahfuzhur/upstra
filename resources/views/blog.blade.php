@extends('layouts.site')
@section('title', 'Blog')
@section('content')

<section class="max-w-7xl mx-auto px-5 pt-16 pb-10 text-center">
  <h1 class="font-head font-bold text-4xl md:text-6xl">{{ cms('blog.hero_title') }}</h1>
  <p class="mt-5 text-ink/80">{{ cms('blog.hero_text') }}</p>
  <form method="post" action="{{ route('subscribe') }}" class="mt-8 mx-auto max-w-md flex bg-soft border border-gray-200 rounded-lg p-1.5">
    @csrf
    <input type="email" name="email" required placeholder="Enter your email" class="flex-1 bg-transparent px-4 text-sm outline-none">
    <button class="bg-brand text-white rounded-md px-6 py-2.5 text-sm font-medium hover:bg-red-800">Subscribe</button>
  </form>
</section>

@if($featured->count())
<section class="max-w-7xl mx-auto px-5 py-10">
  <h2 class="font-head font-bold text-2xl">{{ cms('blog.recent_title') }}</h2>
  <div class="mt-6 grid lg:grid-cols-[1.1fr_1fr] gap-8">
    @php $first = $featured->first(); @endphp
    <a href="{{ route('blog.show', $first) }}" class="group block">
      @include('partials.ph', ['src' => img($first->image), 'class' => 'w-full aspect-[16/10]'])
      <p class="text-xs text-ink/70 mt-4">{{ $first->author }} | {{ $first->published_at?->format('d M Y') }}</p>
      <div class="flex justify-between gap-4 mt-2"><h3 class="font-head font-bold text-2xl group-hover:text-brand">{{ $first->title }}</h3><span class="text-brand">↗</span></div>
      <p class="text-sm text-ink/80 mt-2 max-w-lg">{{ $first->excerpt }}</p>
    </a>
    <div class="space-y-6">
      @foreach($featured->skip(1) as $p)
        <a href="{{ route('blog.show', $p) }}" class="group grid grid-cols-[2fr_3fr] gap-5">
          @include('partials.ph', ['src' => img($p->image), 'class' => 'w-full aspect-[4/3]'])
          <div>
            <p class="text-xs text-ink/70">{{ $p->author }} | {{ $p->published_at?->format('d M Y') }}</p>
            <h3 class="font-head font-bold text-xl mt-1 group-hover:text-brand">{{ $p->title }}</h3>
            <p class="text-xs text-ink/80 mt-2">{{ \Illuminate\Support\Str::limit($p->excerpt, 130) }}</p>
          </div>
        </a>
      @endforeach
    </div>
  </div>
</section>
@endif

<section class="max-w-7xl mx-auto px-5 py-12">
  <h2 class="font-head font-bold text-2xl">{{ cms('blog.all_title') }}</h2>
  <div class="mt-6 grid md:grid-cols-3 gap-x-6 gap-y-10">
    @foreach($posts as $post)@include('partials.post-card', ['post' => $post])@endforeach
  </div>
  @if($more)
    <div class="text-center mt-12"><a href="{{ route('blog', ['n' => $more]) }}" class="text-brand text-lg">Read more →</a></div>
  @endif
</section>
@endsection
