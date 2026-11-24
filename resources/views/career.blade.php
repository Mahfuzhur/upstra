@extends('layouts.site')
@section('title', 'Career')
@section('content')

<section class="bg-gradient-to-r from-tint/70 via-white to-white">
  <div class="max-w-7xl mx-auto px-5 py-16 md:py-24 grid md:grid-cols-2 gap-10 items-center">
    <div>
      <h1 class="font-head font-bold text-4xl md:text-5xl leading-tight">{{ cms('career.hero_title_1') }}<br><span class="text-brand">{{ cms('career.hero_title_2') }}</span></h1>
      <p class="mt-5 flex flex-wrap items-center gap-x-3">
        @foreach(explode('|', cms('career.hero_tagline')) as $i => $w)
          @if($i)<span class="text-brand">•</span>@endif<span>{{ trim($w) }}</span>
        @endforeach
      </p>
      <a href="#openings" class="btn mt-8">{{ cms('career.hero_button') }} ↗</a>
    </div>
    <div>@if($h = img(cms('career.hero_image')))<img src="{{ $h }}" alt="" class="w-full max-w-xl ml-auto rounded-2xl">@endif</div>
  </div>
</section>

<section class="max-w-7xl mx-auto px-5 py-14">
  <h2 class="h2 !text-2xl md:!text-3xl">{{ cms('career.why_title') }}</h2>
  <p class="text-sm text-ink/80 mt-3 max-w-md">{{ cms('career.why_text') }}</p>
  <div class="mt-8 flex gap-5 overflow-x-auto pb-3">
    @foreach(cms_lines('career.why') as $i => $w)
      <div class="min-w-[280px] md:min-w-[300px] flex-1 rounded-lg p-8 text-center {{ $i % 2 ? 'bg-tint' : 'bg-soft' }}">
        <div class="text-brand text-4xl">✦</div>
        <h3 class="text-brand font-head font-semibold text-xl mt-4">{{ $w[0] }}</h3>
        <p class="text-[11px] text-ink/70 mt-2">{{ $w[1] ?? '' }}</p>
      </div>
    @endforeach
  </div>
</section>

<section class="max-w-7xl mx-auto px-5 py-10">
  @include('partials.perks')
</section>

<section id="openings" class="max-w-7xl mx-auto px-5 py-14">
  <h2 class="h2 !text-2xl md:!text-3xl">{{ cms('career.openings_title') }}</h2>
  <p class="text-sm text-ink/80 mt-3 max-w-md">{{ cms('career.openings_text') }}</p>
  <div class="mt-8 space-y-4">
    @forelse($openings as $o)
      <div class="bg-soft border border-gray-200 rounded-xl px-6 md:px-10 py-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
          <a href="{{ route('career.show', $o) }}" class="font-head font-semibold text-xl hover:text-brand">{{ $o->title }}</a>
          <p class="text-ink/60 mt-2 flex flex-wrap gap-x-8 gap-y-1"><span>{{ $o->experience }} Experience</span><span>{{ $o->work_mode }}</span><span>{{ $o->job_type }}</span></p>
        </div>
        <a href="{{ route('career.show', $o) }}#apply" class="btn self-start md:self-auto">Apply Now ↗</a>
      </div>
    @empty
      <p class="text-sm text-ink/60">There are no open positions right now. Send us your CV below and we will contact you when a role opens.</p>
    @endforelse
  </div>
</section>

<section class="max-w-7xl mx-auto px-5 py-14 grid md:grid-cols-2 gap-10">
  <div>
    @include('partials.eyebrow', ['t' => cms('career.contact_label')])
    <h2 class="font-head font-bold text-4xl md:text-5xl leading-tight mt-4">{{ cms('career.contact_title') }}</h2>
    <p class="text-sm text-ink/80 mt-5 max-w-sm">{{ cms('career.contact_text') }}</p>
  </div>
  <div id="apply">@include('partials.apply', ['opening_id' => null])</div>
</section>
@endsection
