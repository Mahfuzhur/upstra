@extends('layouts.site')
@section('title', 'Product & Services')
@section('content')

@php $bg = img(cms('products.hero_image')); @endphp
<section class="relative bg-white" @if($bg) style="background: url('{{ $bg }}') right center / cover no-repeat" @endif>
  <div class="absolute inset-0 bg-white/70 md:hidden"></div>
  <div class="relative max-w-7xl mx-auto px-5 py-14 md:py-20 min-h-[380px] md:min-h-[500px] flex items-center">
    <div class="max-w-xl">
      <h1 class="font-head font-bold text-4xl md:text-6xl leading-tight">{{ cms('products.hero_title_1') }}<br><span class="text-brand">{{ cms('products.hero_title_2') }}</span></h1>
      <p class="mt-5 text-ink/80 max-w-md">{{ cms('products.hero_text') }}</p>
      <div class="mt-8 flex flex-wrap gap-x-6 gap-y-2 text-sm font-medium">
        @foreach(lines(cms('products.partners')) as $n)<span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-brand"></span>{{ $n }}</span>@endforeach
      </div>
    </div>
  </div>
</section>

<section class="max-w-7xl mx-auto px-5 py-16">
  @include('partials.eyebrow', ['t' => cms('products.section_label')])
  <h2 class="h2 mt-3">{{ cms('products.section_title') }}</h2>
  <p class="text-sm text-ink/80 mt-3 max-w-md">{{ cms('products.section_text') }}</p>
  <div class="mt-10">@include('partials.tabs')</div>
</section>

<section class="max-w-7xl mx-auto px-5 py-10">
  <h2 class="h2">{{ cms('products.cap_title') }}</h2>
  <div class="mt-8 grid md:grid-cols-3 gap-5">
      <div class="bg-tint rounded-xl p-8 text-center">
        <div style="display: flex; justify-content: center;" class="text-brand text-4xl">
          <img src="{{ asset('images/system-cloud__1__1.svg') }}" />
        </div>
        <h3 style="font-size: 25px;" class="font-head font-bold text-xl mt-4">Cloud Infrastructure & Migration</h3>
        <p class="text-xs text-ink/70 mt-3">Secure, scalable cloud foundations and migration.</p>
      </div>
      <div class="bg-tint rounded-xl p-8 text-center">
        <div style="display: flex; justify-content: center;" class="text-brand text-4xl">
          <img src="{{ asset('images/stats__1__1.svg') }}" />
        </div>
        <h3 style="font-size: 25px;" class="font-head font-bold text-xl mt-4">Data & AI Modernization</h3>
        <p class="text-xs text-ink/70 mt-3">BigQuery, ML pipelines, Vertex AI.</p>
      </div>
      <div class="bg-tint rounded-xl p-8 text-center">
        <div style="display: flex; justify-content: center;" class="text-brand text-4xl">
          <img src="{{ asset('images/workflow-setting_1.svg') }}" />
        </div>
        <h3 style="font-size: 25px;" class="font-head font-bold text-xl mt-4">Managed Kubernetes & DevOps</h3>
        <p class="text-xs text-ink/70 mt-3">GKE modernization, automation, 24/7 reliability.</p>
      </div>
  </div>
</section>

<section class="max-w-7xl mx-auto px-5 py-14 grid md:grid-cols-[1fr_3fr] gap-8 items-center">
  <div>
    <h2 style="font-size: 28px;" class="font-head font-bold text-2xl">{{ cms('products.stack_title') }}</h2>
    <p style="font-size: 13px;" class="text-xs text-ink/70 mt-3">{{ cms('products.stack_text') }}</p>
  </div>
  <div class="grid grid-cols-2 md:grid-cols-4 md:divide-x divide-gray-200 gap-y-6 text-center">
      <div class="px-4">
        <div style="display: flex; justify-content: center;" class="text-brand text-3xl">
          <img src="{{ asset('images/Google_Cloud_1.png') }}" />
        </div>
        <b style="font-size: 28px;" class="block font-head text-lg mt-2">Google Cloud Platform</b>
        <p style="font-size: 13px;" class="text-[11px] text-ink/60 mt-1">Enterprise-grade cloud infrastructure and AI-powered services.</p>
      </div>
      <div class="px-4">
        <div style="display: flex; justify-content: center;" class="text-brand text-3xl">
          <img src="{{ asset('images/tencentcloud-color_1.png') }}" />
        </div>
        <b style="font-size: 28px;" class="block font-head text-lg mt-2">Tencent Cloud</b>
        <p style="font-size: 13px;" class="text-[11px] text-ink/60 mt-1">BigQuery, ML pipelines, Vertex AI</p>
      </div>
      <div class="px-4">
        <div style="display: flex; justify-content: center;" class="text-brand text-3xl">
          <img src="{{ asset('images/image_2.png') }}" />
        </div>
        <b style="font-size: 28px;" class="block font-head text-lg mt-2">Mixpanel Analytics</b>
        <p style="font-size: 13px;" class="text-[11px] text-ink/60 mt-1">GKE modernization, automation, 24/7 reliability</p>
      </div>
      <div class="px-4">
        <div style="display: flex; justify-content: center;" class="text-brand text-3xl">
          <img src="{{ asset('images/three.png') }}" />
        </div>
        <b style="font-size: 28px;" class="block font-head text-lg mt-2">Mandiant Security</b>
        <p style="font-size: 13px;" class="text-[11px] text-ink/60 mt-1">GKE modernization, automation, 24/7 reliability</p>
      </div>
  </div>
</section>

@include('partials.cta', ['p' => 'products'])
@endsection
