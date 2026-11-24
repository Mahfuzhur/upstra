{{-- vars: $p (page key) --}}
<section class="text-center py-20 px-5">
  <div class="w-16 h-16 mx-auto rounded-full bg-soft grid place-items-center text-brand text-2xl">🚀</div>
  <h2 class="font-head font-bold text-4xl md:text-6xl text-ink mt-6 leading-tight">{{ cms($p.'.cta_title_1') }}<br><span class="text-brand">{{ cms($p.'.cta_title_2') }}</span></h2>
  <a href="{{ route('contact') }}" class="btn mt-8">{{ cms($p.'.cta_button') }}</a>
</section>
