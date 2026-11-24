@extends('layouts.site')
@section('title', 'Home')
@section('content')

@php $bg = img(cms('home.hero_image')); @endphp
<section class="relative bg-white" @if($bg) style="background: url('{{ $bg }}') center / cover no-repeat; padding-top: 115px; height: 630px;" @endif>
  <div class="absolute inset-0 bg-white/70 md:hidden"></div>
  <div class="relative max-w-7xl mx-auto px-5 py-16 md:py-24 min-h-[420px] md:min-h-[560px] flex items-center">
    <div class="max-w-xl">
      <h1 class="font-head font-bold text-4xl md:text-5xl leading-tight">{{ cms('home.hero_title_1') }}<br><span class="text-brand">{{ cms('home.hero_title_2') }}</span></h1>
      <p class="mt-5 text-ink/80 max-w-lg">{{ cms('home.hero_text') }}</p>
      <a href="{{ route('products') }}" class="btn mt-8">{{ cms('home.hero_button') }} ↗</a>
    </div>
  </div>
</section>

<section class="max-w-7xl mx-auto px-5 py-16">
  @include('partials.eyebrow', ['t' => cms('home.products_label')])
  <h2 class="h2 mt-3">{{ cms('home.products_title') }}</h2>
  <p class="text-sm text-ink/80 mt-3 max-w-md">{{ cms('home.products_text') }}</p>
  <div class="mt-10">@include('partials.tabs')</div>
</section>

<section class="bg-tint/40 py-16">
  <div class="max-w-7xl mx-auto px-5">
    @include('partials.eyebrow', ['t' => cms('home.stats_label')])
    <h2 class="h2 mt-3">{{ cms('home.stats_title') }}</h2>
    <div class="mt-8 grid grid-cols-2 md:grid-cols-5 gap-4">
      @foreach(cms_lines('home.stats') as $s)
        <div class="bg-white border border-gray-100 rounded-lg p-5">
          <div style="font-size: 25px;" class="text-brand text-xl">☺</div>
          <div class="font-head font-bold text-3xl mt-2">{{ $s[0] }}</div>
          <div class="text-xs text-ink/70 mt-1">{{ $s[1] ?? '' }}</div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<section class="max-w-7xl mx-auto px-5 py-16">
  @include('partials.eyebrow', ['t' => 'Clients'])
  <h2 class="h2 mt-3">{{ cms('home.clients_title') }}</h2>
  <p class="text-sm text-ink/80 mt-3 max-w-md">{{ cms('home.clients_text') }}</p>
  <div class="mt-8 grid grid-cols-2 md:grid-cols-5 gap-4">
      <div class="border border-gray-100 rounded-lg h-24 grid place-items-center p-4 bg-white">
         <span><img src="{{ asset('images/Banglalink.svg') }}" alt="Google Cloud"></span>
      </div>
      <div class="border border-gray-100 rounded-lg h-24 grid place-items-center p-4 bg-white">
         <span><img src="{{ asset('images/brac.png') }}" alt="Google Cloud"></span>
      </div>
      <div class="border border-gray-100 rounded-lg h-24 grid place-items-center p-4 bg-white">
         <span><img src="{{ asset('images/HSBC.svg') }}" alt="Google Cloud"></span>
      </div>
      <div class="border border-gray-100 rounded-lg h-24 grid place-items-center p-4 bg-white">
         <span><img src="{{ asset('images/bkash.png') }}" alt="Google Cloud"></span>
      </div>
      <div class="border border-gray-100 rounded-lg h-24 grid place-items-center p-4 bg-white">
         <span><img src="{{ asset('images/ucb.png') }}" alt="Google Cloud"></span>
      </div>
  </div>
</section>

<section class="max-w-7xl mx-auto px-5 py-10" x-data="{ f: 'All' }">
  @include('partials.eyebrow', ['t' => 'Our Portfolio'])
  <h2 class="h2 mt-3">{{ cms('home.portfolio_title') }}</h2>
  <p class="text-sm text-ink/80 mt-3 max-w-xl">{{ cms('home.portfolio_text') }}</p>
  <div class="mt-6 flex flex-wrap gap-2 text-sm">
    @foreach(collect(['All'])->merge($projects->pluck('category')->filter()->unique()) as $cat)
      <button type="button" @click="f = '{{ $cat }}'" :class="f === '{{ $cat }}' ? 'bg-brand text-white' : 'bg-soft text-ink/70'" class="px-5 py-1.5 rounded-full">{{ $cat }}</button>
    @endforeach
  </div>
  <div class="mt-6 grid md:grid-cols-3 gap-5">
    @foreach($projects as $p)
      <a href="{{ $p->link ?: '#' }}" x-show="f === 'All' || f === '{{ $p->category }}'" class="block bg-soft rounded-2xl overflow-hidden">
        @include('partials.ph', ['src' => img($p->image), 'class' => 'w-full aspect-[16/10]'])
        <div class="p-4 flex items-end justify-between">
          <div><p class="text-brand text-xs">{{ $p->category }}</p><p class="font-head font-bold">{{ $p->title }}</p></div>
          <span class="text-brand">→</span>
        </div>
      </a>
    @endforeach
  </div>
</section>

@if($testimonials->count())
<section class="bg-tint/40 py-16 mt-10" x-data="{ i: 0, n: {{ $testimonials->count() }} }">
  <div class="max-w-7xl mx-auto px-5 grid md:grid-cols-3 gap-8 items-center">
    <div>
      @include('partials.eyebrow', ['t' => 'Client Words'])
      <h2 class="h2 mt-3">{{ cms('home.testimonials_title') }}</h2>
      <p class="text-sm text-ink/80 mt-3">{{ cms('home.testimonials_text') }}</p>
    </div>
    <div class="md:col-span-2">
      @foreach($testimonials as $k => $t)
        <div x-show="i === {{ $k }}" @if($k) x-cloak @endif class="bg-white rounded-xl border border-gray-100 p-8">
          <div class="text-brand text-3xl font-head">“</div>
          <p class="text-sm text-ink/80 max-w-xl">{{ $t->quote }}</p>
          <div class="flex items-center gap-3 mt-6">
            @if($t->photo)<img src="{{ img($t->photo) }}" class="w-10 h-10 rounded-full object-cover" alt="">@else<div class="w-10 h-10 rounded-full ph"></div>@endif
            <div class="text-xs"><b class="block">{{ $t->name }}</b>{{ $t->position }}</div>
          </div>
        </div>
      @endforeach
      @if($testimonials->count() > 1)
        <div class="flex gap-2 mt-4 justify-end">
          <button type="button" @click="i = (i - 1 + n) % n" class="w-9 h-9 rounded-full bg-white border">←</button>
          <button type="button" @click="i = (i + 1) % n" class="w-9 h-9 rounded-full bg-white border">→</button>
        </div>
      @endif
    </div>
  </div>
</section>
@endif

<section class="max-w-7xl mx-auto px-5 py-16">
  @include('partials.eyebrow', ['t' => 'Our Approach'])
  <h2 class="h2 mt-3">{{ cms('home.approach_title') }}</h2>
  <div class="mt-8 grid md:grid-cols-4 gap-6">
     <div>
        <div class="flex justify-between items-start"><span class="w-10 h-10 rounded-lg bg-tint text-brand grid place-items-center"><img src="{{ asset('images/brain-circuit_2.svg') }}"/></span><span style="font-size: 16px;" class=" text-ink/50">01</span></div>
        <h3 class="font-head font-bold text-lg mt-4">Understand</h3>
        <p class="text-xs text-ink/70 mt-2">We always try to understand the products, services & business process of the customer</p>
      </div>
      <div>
        <div class="flex justify-between items-start"><span class="w-10 h-10 rounded-lg bg-tint text-brand grid place-items-center"><img src="{{ asset('images/plan-strategy_1.svg') }}"/></span><span style="font-size: 16px;" class="text-ink/50">02</span></div>
        <h3 class="font-head font-bold text-lg mt-4">Plan</h3>
        <p class="text-xs text-ink/70 mt-2">We identify the problem the business is having and make a requirement analysis for the client</p>
      </div>
      <div>
        <div class="flex justify-between items-start"><span class="w-10 h-10 rounded-lg bg-tint text-brand grid place-items-center"><img src="{{ asset('images/settings-sliders_1.svg') }}"/></span><span style="font-size: 16px;" class=" text-ink/50">03</span></div>
        <h3 class="font-head font-bold text-lg mt-4">Implement</h3>
        <p class="text-xs text-ink/70 mt-2">We always try to understand the products, services & business process of the customer.</p>
      </div>
      <div>
        <div class="flex justify-between items-start"><span class="w-10 h-10 rounded-lg bg-tint text-brand grid place-items-center"><img src="{{ asset('images/user-headset_1.svg') }}"/></span><span style="font-size: 16px;" class=" text-ink/50">04</span></div>
        <h3 class="font-head font-bold text-lg mt-4">Support</h3>
        <p class="text-xs text-ink/70 mt-2">We always try to understand the products, services & business process of the customer.</p>
      </div>
  </div>
</section>

{{-- 3-step wizard --}}
<section class="max-w-4xl mx-auto px-5 pb-16 text-center" x-data="{ s: 1, obj: '', cur: '' }">
  <span style="font-weight: 600;" class="inline-block text-[11px] tracking-widest text-brand bg-tint rounded-full px-4 py-1">INTERACTIVE CONSULTATION</span>
  <h2 class="font-head font-bold text-3xl md:text-4xl mt-4">{{ cms('home.wizard_title') }}</h2>
  <p class="text-sm text-ink/70 mt-2">{{ cms('home.wizard_text') }}</p>
  <div class="flex items-center justify-center gap-3 mt-6">
    @foreach([1, 2, 3] as $n)
      <span :class="s >= {{ $n }} ? 'bg-brand text-white' : 'bg-gray-200 text-ink/60'" class="w-7 h-7 rounded-full grid place-items-center text-xs">{{ $n }}</span>
      @if($n < 3)<span style="font-weight: 600;" class="w-14 h-px bg-brand/50"></span>@endif
    @endforeach
  </div>

  <div x-show="s === 1" class="mt-6">
    <p style="font-weight: 600;" class="font-semibold">Step 1: Select Your Primary Strategic Objective</p>
    <div class="grid md:grid-cols-3 gap-4 mt-5 text-left">
      @foreach(cms_lines('home.wizard_objectives') as $o)
        <button type="button" @click="obj = '{{ addslashes($o[0]) }}'; s = 2" class="bg-tint/60 border border-tint rounded-xl p-5 hover:border-brand">
          <img style="height: 30px;"
                    src="{{ asset($o[2] ?? 'images/icons/cloud.svg') }}"
                    alt="{{ $o[0] }}"
                    class="w-12 h-12 object-contain mb-4"
                />
          <b class="block text-sm">{{ $o[0] }}</b><span style="font-weight: 600;" class="text-xs text-ink/60">{{ $o[1] ?? '' }}</span>
        </button>
      @endforeach
    </div>
  </div>

  <div x-show="s === 2" x-cloak class="mt-6">
    <p class="font-semibold">Step 2: Where are you today?</p>
    <div class="grid md:grid-cols-4 gap-4 mt-5">
      @foreach(lines(cms('home.wizard_current')) as $o)
        <button type="button" @click="cur = '{{ addslashes($o) }}'; s = 3" class="bg-tint/60 border border-tint rounded-xl p-5 text-sm hover:border-brand">{{ $o }}</button>
      @endforeach
    </div>
    <button type="button" @click="s = 1" class="mt-4 text-xs text-ink/60 underline">Back</button>
  </div>

  <form x-show="s === 3" x-cloak method="post" action="{{ route('contact.send') }}" class="mt-6 max-w-md mx-auto space-y-3 text-left">
    @csrf
    <p class="font-semibold text-center">Step 3: Where should we send your blueprint?</p>
    <input type="hidden" name="subject" value="Consultation Wizard">
    <input type="hidden" name="message" :value="'Objective: ' + obj + ' | Current setup: ' + cur">
    <input class="inp" name="first_name" placeholder="Your name" required>
    <input class="inp" type="email" name="email" placeholder="Email" required>
    <input class="inp" name="phone" placeholder="Phone (optional)">
    <button class="btn w-full">Get my blueprint</button>
    <button type="button" @click="s = 2" class="block mx-auto text-xs text-ink/60 underline">Back</button>
  </form>
</section>

<section class="bg-tint">
  <div class="max-w-7xl mx-auto px-5 py-12 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
    <div>
      <h2 class="font-head font-bold text-4xl md:text-5xl leading-tight">{{ cms('home.cta_title_1') }}<br><span class="text-brand">{{ cms('home.cta_title_2') }}</span></h2>
      <p class="text-xs text-ink/70 mt-3 max-w-md">{{ cms('home.cta_text') }}</p>
    </div>
    <a href="{{ route('contact') }}" class="btn self-start md:self-auto">{{ cms('home.cta_button') }} ↗</a>
  </div>
</section>
@endsection
