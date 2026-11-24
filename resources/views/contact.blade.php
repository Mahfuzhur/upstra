@extends('layouts.site')
@section('title', 'Contact')
@section('content')
<section class="max-w-6xl mx-auto px-5 pt-16 pb-20">
  <div class="text-center">
    <h1 class="font-head font-bold text-4xl md:text-5xl text-brand">{{ cms('contact.title') }}</h1>
    <p class="mt-4 text-ink/70">{{ cms('contact.text') }}</p>
  </div>
  <div class="mt-12 bg-soft rounded-lg p-3 grid md:grid-cols-[5fr_8fr] gap-6 shadow-sm">
    <div class="bg-ink text-white rounded-lg p-8 md:p-10 min-h-[420px] relative overflow-hidden">
      <h2 class="font-head text-2xl">{{ cms('contact.info_title') }}</h2>
      <p class="text-sm text-white/80 mt-2">{{ cms('contact.info_text') }}</p>
      <ul class="mt-16 space-y-8 text-sm">
        <li class="flex gap-5 items-center"><span>☎</span>{{ cms('site.phone') }}</li>
        <li class="flex gap-5 items-center"><span>✉</span>{{ cms('site.email') }}</li>
        <li class="flex gap-5 items-start"><span>⌖</span>{{ cms('site.address') }}</li>
      </ul>
      <div class="absolute -bottom-10 -right-6 w-36 h-36 rounded-full bg-white/10"></div>
    </div>
    <form method="post" action="{{ route('contact.send') }}" class="p-4 md:p-8 space-y-7">
      @csrf
      @php $ul = 'w-full bg-transparent border-0 border-b border-ink/40 py-2 outline-none focus:border-brand text-sm'; @endphp
      <div class="grid md:grid-cols-2 gap-8">
        <label class="text-sm text-ink/70">First Name<input name="first_name" value="{{ old('first_name') }}" required class="{{ $ul }}"></label>
        <label class="text-sm text-ink/70">Last Name<input name="last_name" value="{{ old('last_name') }}" placeholder="Doe" class="{{ $ul }}"></label>
        <label class="text-sm text-ink/70">Email<input type="email" name="email" value="{{ old('email') }}" required class="{{ $ul }}"></label>
        <label class="text-sm text-ink/70">Phone Number<input name="phone" value="{{ old('phone') }}" placeholder="+1 012 3456 789" class="{{ $ul }}"></label>
      </div>
      <div>
        <p class="text-sm text-ink/70">Select Subject?</p>
        <div class="mt-3 flex flex-wrap gap-x-6 gap-y-2 text-sm text-ink/70">
          @foreach(lines(cms('contact.subjects')) as $i => $s)
            <label class="flex items-center gap-2 cursor-pointer"><input type="radio" name="subject" value="{{ $s }}" class="accent-brand" @checked(old('subject', $i === 0 ? $s : null) === $s)>{{ $s }}</label>
          @endforeach
        </div>
      </div>
      <label class="block text-sm text-ink/70">Message<textarea name="message" rows="2" required placeholder="Write your message.." class="{{ $ul }}">{{ old('message') }}</textarea></label>
      <div class="text-right"><button class="btn !px-10 !py-3.5 text-lg">Send Message</button></div>
    </form>
  </div>
</section>
@endsection
