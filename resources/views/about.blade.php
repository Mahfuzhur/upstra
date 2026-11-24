@extends('layouts.site')
@section('title', 'About Us')
@section('content')

@php $bg = img(cms('about.hero_image')); @endphp
<section class="relative bg-white" @if($bg) style="background: url('{{ $bg }}') right bottom / cover no-repeat" @endif>
  <div class="absolute inset-0 bg-white/70 md:hidden"></div>
  <div class="relative max-w-7xl mx-auto px-5 py-16 md:py-24 min-h-[380px] md:min-h-[480px] flex items-center">
    <div class="max-w-xl">
      <h1 class="font-head font-bold text-4xl md:text-5xl leading-tight">{{ cms('about.hero_title_1') }}<br><span class="text-brand">{{ cms('about.hero_title_2') }}</span></h1>
      <p class="mt-5 text-ink/80 max-w-md">{{ cms('about.hero_text') }}</p>
      <a href="#journey" class="btn mt-8">{{ cms('about.hero_button') }} ↗</a>
    </div>
  </div>
</section>

<section class="max-w-7xl mx-auto px-5 py-16 grid md:grid-cols-2 gap-10 items-center">
  <div class="bg-soft rounded-2xl aspect-[16/10] grid place-items-center overflow-hidden">
    @if($w = img(cms('about.who_image')))<img src="{{ $w }}" alt="" class="w-full h-full object-cover">@else<span class="font-head font-extrabold text-5xl text-brand">UPSTRA</span>@endif
  </div>
  <div>
    @include('partials.eyebrow', ['t' => cms('about.who_label')])
    <h2 class="h2 mt-3 !text-2xl md:!text-3xl">{{ cms('about.who_title') }}</h2>
    <div class="text-sm text-ink/80 mt-4 space-y-2">@foreach(lines(cms('about.who_text')) as $para)<p>{{ $para }}</p>@endforeach</div>
  </div>
</section>

<section class="max-w-7xl mx-auto px-5 py-10">
  @include('partials.eyebrow', ['t' => cms('about.purpose_label')])
  <h2 class="h2 mt-3 !text-2xl md:!text-3xl">{{ cms('about.purpose_title') }}</h2>
  <p class="text-sm text-ink/80 mt-3 max-w-md">{{ cms('about.purpose_text') }}</p>
  <div class="mt-8 grid md:grid-cols-2 gap-5">
    @foreach([['mission', '◎'], ['vision', '◉']] as [$k, $ic])
      <div class="bg-soft border border-gray-200 rounded-lg p-6">
        <span class="w-11 h-11 rounded bg-brand text-white grid place-items-center">{{ $ic }}</span>
        <h3 class="text-brand font-semibold mt-5">{{ cms("about.{$k}_title") }}</h3>
        <p class="text-xs text-ink/70 mt-2">{{ cms("about.{$k}_text") }}</p>
      </div>
    @endforeach
  </div>
</section>

<section class="max-w-7xl mx-auto px-5 py-14">
  @include('partials.eyebrow', ['t' => cms('about.team_label')])
  <h2 class="h2 mt-3 !text-2xl md:!text-3xl">{{ cms('about.team_title') }}</h2>
  <p class="text-sm text-ink/80 mt-3 max-w-md">{{ cms('about.team_text') }}</p>
  <div class="mt-8 grid md:grid-cols-3 gap-5">
    @foreach($members as $m)
      <div class="bg-soft rounded-3xl overflow-hidden">
        @include('partials.ph', ['src' => img($m->photo), 'class' => 'w-full aspect-[4/5]'])
        <div class="p-5"><p class="text-brand text-lg">{{ $m->name }}</p><p class="text-xs text-ink/60">{{ $m->role }}</p></div>
      </div>
    @endforeach
  </div>
</section>

<section id="journey" class="max-w-7xl mx-auto px-5 py-10">
  @include('partials.eyebrow', ['t' => cms('about.journey_label')])
  <h2 class="h2 mt-3 !text-2xl md:!text-3xl">{{ cms('about.journey_title') }}</h2>
  <p class="text-sm text-ink/80 mt-3 max-w-md">{{ cms('about.journey_text') }}</p>
  <div class="mt-10 grid grid-cols-2 md:grid-cols-4 gap-6 border-t border-gray-200 pt-6 relative">
    @foreach(cms_lines('about.journey') as $j)
      <div class="relative">
        <span class="absolute -top-[30px] left-0 w-2.5 h-2.5 rounded-full bg-brand"></span>
        <div class="font-head font-bold text-2xl text-brand">{{ $j[0] }}</div>
        <p class="text-xs text-ink/70 mt-2">{{ $j[1] ?? '' }}</p>
      </div>
    @endforeach
  </div>
</section>

@include('partials.cta', ['p' => 'about'])
@endsection
