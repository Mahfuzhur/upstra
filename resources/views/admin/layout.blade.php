<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title', 'Admin') | UPSTRA CMS</title>
<script src="https://cdn.tailwindcss.com"></script>
<script>tailwind.config = { theme: { extend: { colors: { brand: '#D6202B', ink: '#33363F' } } } }</script>
</head>
<body class="bg-gray-100 text-ink">
<div class="min-h-screen md:flex">
  <aside class="md:w-64 bg-ink text-white p-5 md:min-h-screen shrink-0">
    <a href="{{ route('admin.dashboard') }}" class="block font-extrabold text-2xl tracking-tight">UPSTRA <span class="text-sm font-normal text-white/60">CMS</span></a>
    <nav class="mt-6 space-y-1 text-sm">
      <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded hover:bg-white/10">Dashboard</a>
      <p class="px-3 pt-4 pb-1 text-xs text-white/50">Page content</p>
      @foreach(config('cms.pages') as $key => $p)
        <a href="{{ route('admin.pages.edit', $key) }}" class="block px-3 py-2 rounded hover:bg-white/10 {{ request()->is("admin/pages/$key") ? 'bg-white/10' : '' }}">{{ $p['label'] }}</a>
      @endforeach
      <p class="px-3 pt-4 pb-1 text-xs text-white/50">Lists</p>
      @foreach(config('cms.resources') as $key => $c)
        <a href="{{ route('admin.res.index', $key) }}" class="block px-3 py-2 rounded hover:bg-white/10 {{ request()->is("admin/r/$key*") ? 'bg-white/10' : '' }}">{{ $c['label'] }}</a>
      @endforeach
    </nav>
    <div class="mt-8 pt-4 border-t border-white/10 text-sm space-y-2">
      <a href="{{ route('home') }}" target="_blank" class="block text-white/70 hover:text-white">View website ↗</a>
      <form method="post" action="{{ route('admin.logout') }}">@csrf<button class="text-white/70 hover:text-white">Log out</button></form>
    </div>
  </aside>
  <main class="flex-1 p-5 md:p-10 max-w-5xl">
    <h1 class="text-2xl font-bold mb-6">@yield('title')</h1>
    @if(session('ok'))<div class="mb-5 rounded bg-green-100 text-green-800 px-4 py-3 text-sm">{{ session('ok') }}</div>@endif
    @if($errors->any())<div class="mb-5 rounded bg-red-100 text-red-800 px-4 py-3 text-sm"><ul class="list-disc pl-5">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
    @yield('content')
  </main>
</div>
</body>
</html>
