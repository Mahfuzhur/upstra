@extends('layouts.site')
@section('title', $opening->title)
@section('content')

<section class="bg-gradient-to-r from-tint/70 via-white to-white">
  <div class="max-w-7xl mx-auto px-5 py-12 md:py-16 grid md:grid-cols-2 gap-8 items-center">
    <div>
      <span class="inline-block border border-brand text-brand rounded-full px-5 py-1.5 text-sm">Job Details</span>
      <h1 class="font-head font-bold text-4xl md:text-5xl mt-8">{{ $opening->title }}</h1>
    </div>
    <div>@if($j = img(cms('career.job_image')))<img src="{{ $j }}" alt="" class="w-full max-w-xl ml-auto rounded-2xl">@endif</div>
  </div>
</section>

<section class="max-w-7xl mx-auto px-5 py-14 grid lg:grid-cols-[2fr_1fr] gap-10 items-start">
  <div>
    <h2 class="font-head font-bold text-3xl">Description</h2>
    <p class="mt-3 text-ink/80">{{ $opening->description }}</p>

    <h2 class="font-head font-bold text-3xl mt-10">Responsibilities</h2>
    <ul class="mt-3 list-disc pl-5 space-y-2 text-ink/80">@foreach(lines($opening->responsibilities) as $l)<li>{{ $l }}</li>@endforeach</ul>

    <h2 class="font-head font-bold text-3xl mt-10">Requirements</h2>
    <ul class="mt-3 list-disc pl-5 space-y-2 text-ink/80">@foreach(lines($opening->requirements) as $l)<li>{{ $l }}</li>@endforeach</ul>
  </div>

  <aside class="bg-tint/70 rounded-2xl p-6 lg:sticky lg:top-24">
    <div class="text-center font-head font-extrabold text-3xl text-brand pb-5 border-b border-brand/10">UPSTRA</div>
    <dl class="grid grid-cols-2 gap-y-5 mt-5 text-sm">
      <div><dt class="text-ink/60 text-xs">Salary</dt><dd class="font-semibold">{{ $opening->salary }}</dd></div>
      <div><dt class="text-ink/60 text-xs">Job Type</dt><dd class="font-semibold">{{ $opening->job_type }}</dd></div>
      <div><dt class="text-ink/60 text-xs">Location</dt><dd class="font-semibold">{{ $opening->location }}</dd></div>
      <div><dt class="text-ink/60 text-xs">Experience</dt><dd class="font-semibold">{{ $opening->experience }}</dd></div>
      <div><dt class="text-ink/60 text-xs">Job Posted On</dt><dd class="font-semibold">{{ $opening->posted_on?->format('d M, Y') }}</dd></div>
      <div><dt class="text-ink/60 text-xs">Apply Before</dt><dd class="font-semibold">{{ $opening->apply_before?->format('d M, Y') }}</dd></div>
    </dl>
    <a href="#apply" class="btn w-full !rounded-md mt-6">Apply Now</a>
  </aside>
</section>

<section class="max-w-7xl mx-auto px-5 pb-10">@include('partials.perks', ['big' => true])</section>

<section id="apply" class="max-w-3xl mx-auto px-5 py-14">
  <h2 class="font-head font-bold text-3xl mb-6">Apply for {{ $opening->title }}</h2>
  @include('partials.apply', ['opening_id' => $opening->id])
</section>
@endsection
