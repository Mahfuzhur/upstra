<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title', 'UPSTRA') | UPSTRA</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Urbanist:wght@500;600;700;800&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = { theme: { extend: {
  colors: { brand: '#D6202B', ink: '#33363F', soft: '#F5F5F7', tint: '#FBE4E6' },
  fontFamily: { sans: ['Inter', 'sans-serif'], head: ['Urbanist', 'sans-serif'] } } } }
</script>
<style type="text/tailwindcss">
  @layer components {
    .btn { @apply inline-flex items-center justify-center gap-2 bg-brand text-white rounded-full px-7 py-3 font-medium hover:bg-red-800 transition; }
    .h2 { @apply font-head font-bold text-3xl md:text-4xl text-ink tracking-tight; }
    .inp { @apply w-full bg-soft border border-gray-200 rounded-lg px-4 py-3 text-sm outline-none focus:border-brand; }
  }
  .ph { background: conic-gradient(#e8e8ec 25%, #f6f6f8 0 50%, #e8e8ec 0 75%, #f6f6f8 0) 0 0 / 24px 24px; }
  [x-cloak] { display: none !important; }
</style>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>
</head>
<body class="font-sans text-ink bg-white antialiased">

<header class="sticky top-0 z-40 bg-white/95 backdrop-blur border-b border-gray-100" x-data="{ open: false }">
  <div class="max-w-7xl mx-auto px-5 h-16 flex items-center justify-between">
    <a href="{{ route('home') }}" class="font-head font-extrabold text-2xl text-brand tracking-tight">
      @if($logo = img(cms('site.logo')))<img src="{{ $logo }}" class="h-7" alt="UPSTRA">@else UPSTRA @endif
    </a>
    <nav class="hidden md:flex gap-9 text-sm">
      @foreach([['home','Home'],['products','Product & Services'],['about','About Us'],['career','Career'],['blog','Blog']] as [$r, $l])
        <a href="{{ route($r) }}" class="py-5 border-b-2 {{ request()->routeIs($r, $r.'.*') ? 'border-brand text-ink' : 'border-transparent text-ink/80 hover:text-brand' }}">{{ $l }}</a>
      @endforeach
    </nav>
    <a href="{{ route('contact') }}" class="btn !py-2 !px-5 text-sm hidden md:inline-flex">{{ cms('site.demo_label') }}</a>
    <button class="md:hidden p-2" @click="open = !open" aria-label="Menu">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
    </button>
  </div>
  <nav x-show="open" x-cloak class="md:hidden border-t px-5 py-3 flex flex-col gap-3 text-sm bg-white">
    @foreach([['home','Home'],['products','Product & Services'],['about','About Us'],['career','Career'],['blog','Blog'],['contact', cms('site.demo_label')]] as [$r, $l])
      <a href="{{ route($r) }}">{{ $l }}</a>
    @endforeach
  </nav>
</header>

@if(session('ok'))<div class="bg-green-600 text-white text-center text-sm py-2.5 px-4">{{ session('ok') }}</div>@endif
@if($errors->any())<div class="bg-tint text-brand text-center text-sm py-2.5 px-4">{{ $errors->first() }}</div>@endif

<main>@yield('content')</main>

<footer class="max-w-7xl mx-auto px-5 pb-10 pt-16">
  <div class="rounded-3xl bg-gradient-to-br from-soft to-gray-200/60 px-6 md:px-12 pt-10 pb-6">
    <div class="max-w-4xl mx-auto flex justify-between font-head font-extrabold text-ink leading-none text-[clamp(2.5rem,12vw,8rem)]">
      @foreach(str_split('UPSTRA') as $ch)<span>{{ $ch }}</span>@endforeach
    </div>
    <div class="max-w-4xl mx-auto mt-5 flex justify-between text-ink/60 text-sm md:text-lg">
      <a href="{{ route('products') }}" class="hover:text-brand">Solutions</a>
      <a href="{{ route('career') }}" class="hover:text-brand">Career</a>
      <a href="{{ route('contact') }}" class="hover:text-brand">Contact</a>
      <a href="{{ route('blog') }}" class="hover:text-brand">Blog</a>
    </div>
    <div class="text-center mt-12">
      <svg class="w-8 h-8 mx-auto text-brand/50" fill="none" stroke="currentColor" stroke-width="1.2" viewBox="0 0 24 24"><path d="M6 21V4l8-2v19M14 8l4 1v12M3 21h18M9 7h2M9 11h2M9 15h2"/></svg>
      <p class="font-semibold text-brand">{{ cms('site.city') }}</p>
      <p class="text-sm text-ink/70">{{ cms('site.address') }}</p>
    </div>
    <div class="mt-8 pt-5 border-t border-gray-300 grid md:grid-cols-3 items-center gap-4 text-xs text-ink/70">
      <div>
        @if($deck = img(cms('site.deck')))
          <a href="{{ $deck }}" download class="flex items-center gap-3">
            <span class="w-9 h-9 rounded-full bg-brand text-white grid place-items-center">↓</span>
            <span><b class="text-brand block">Company Deck</b>{{ cms('site.deck_meta') }}</span>
          </a>
        @endif
      </div>
      <p class="text-center">{{ cms('site.copyright') }}</p>
      <div></div>
    </div>
  </div>
</footer>
</body>
</html>
