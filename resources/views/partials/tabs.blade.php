<!-- @php $tabs = cms_lines('products.tabs'); @endphp
<div x-data="{ t: 0 }">
  <div class="flex justify-center overflow-x-auto">
    <div class="inline-flex gap-1 bg-soft border border-gray-200 rounded-xl p-1.5 text-sm whitespace-nowrap">
      @foreach($tabs as $i => $tab)
        <button type="button" @click="t = {{ $i }}" :class="t === {{ $i }} ? 'bg-brand text-white' : 'text-ink hover:bg-white'" class="px-4 py-2 rounded-lg transition">{{ $tab[0] }}</button>
      @endforeach
    </div>
  </div>
  @foreach($tabs as $i => $tab)
    <div x-show="t === {{ $i }}" @if($i) x-cloak @endif class="mt-12 grid md:grid-cols-2 gap-10 items-start">
      <div>
        <h3 class="font-head font-bold text-3xl text-ink">{{ $tab[1] ?? '' }}</h3>
        <p class="mt-4 text-sm text-ink/80 max-w-md">{{ $tab[2] ?? '' }}</p>
        <ul class="mt-6 space-y-3 text-sm">
          @foreach(explode(';', $tab[3] ?? '') as $pt)
            @if(trim($pt))<li class="flex gap-3 items-center"><span class="w-5 h-5 rounded-full bg-tint text-brand grid place-items-center text-[11px]">✓</span>{{ trim($pt) }}</li>@endif
          @endforeach
        </ul>
      </div>
      <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-6 md:p-8">
        <p class="text-xs tracking-widest text-ink/60 mb-4">ARCHITECTURE HIGHLIGHTS</p>
        @foreach(explode(';', $tab[4] ?? '') as $h)
          @php [$a, $b] = array_pad(explode('=', $h, 2), 2, ''); @endphp
          @if(trim($a))
            <div class="flex justify-between items-center gap-3 bg-soft border border-gray-200 rounded-lg px-4 py-3 mb-3 text-sm">
              <span>{{ trim($a) }}</span><span class="bg-tint text-brand text-xs font-semibold px-3 py-1 rounded whitespace-nowrap">{{ trim($b) }}</span>
            </div>
          @endif
        @endforeach
      </div>
    </div>
  @endforeach
</div> -->


@php $tabs = cms_lines('products.tabs'); @endphp
<div x-data="{ t: 0 }">
  <div class="overflow-x-auto">
    <div class="flex min-w-max md:min-w-0 w-full max-w-4xl mx-auto justify-between gap-2 bg-soft border border-gray-200 rounded-xl p-1.5 text-sm whitespace-nowrap">
      @foreach($tabs as $i => $tab)
        @php $url = img(cms('products.tab_icon_' . ($i + 1))) ?: asset('images/icons/cloud.svg'); @endphp
        <button type="button" @click="t = {{ $i }}" :class="t === {{ $i }} ? 'bg-brand text-white' : 'text-ink hover:bg-white'" class="flex items-center gap-2 px-5 py-2.5 rounded-lg font-medium transition">
          <span class="w-4 h-4 shrink-0 bg-current" style="-webkit-mask:url('{{ $url }}') center/contain no-repeat;mask:url('{{ $url }}') center/contain no-repeat"></span>
          {{ $tab[0] }}
        </button>
      @endforeach
    </div>
  </div>
  @foreach($tabs as $i => $tab)
    <div x-show="t === {{ $i }}" @if($i) x-cloak @endif class="mt-12 grid md:grid-cols-2 gap-10 items-start">
      <div>
        <span class="mb-3">
          <img src="{{ asset('images/Google_Cloud_logo_1.svg') }}" alt="Google Cloud">
        </span>
        <h3 style="padding-top: 8px; font-weight: 700; font-size: 30px" class="font-head font-bold text-3xl text-ink">{{ $tab[1] ?? '' }}</h3>
        <p class="mt-4 text-sm text-ink/80 max-w-md">{{ $tab[2] ?? '' }}</p>
        <ul class="mt-6 space-y-3 text-sm">
          @foreach(explode(';', $tab[3] ?? '') as $pt)
            @if(trim($pt))<li class="flex gap-3 items-center"><span class="w-5 h-5 rounded-full bg-tint text-brand grid place-items-center text-[18px]">✓</span>{{ trim($pt) }}</li>@endif
          @endforeach
        </ul>
      </div>
      <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-6 md:p-8">
        <p style="font-size: 16px; font-weight: 600;" class="text-xs tracking-widest text-ink/60 mb-4">ARCHITECTURE HIGHLIGHTS</p>
        @foreach(explode(';', $tab[4] ?? '') as $h)
          @php [$a, $b] = array_pad(explode('=', $h, 2), 2, ''); @endphp
          @if(trim($a))
            <div class="flex justify-between items-center gap-3 bg-soft border border-gray-200 rounded-lg px-4 py-3 mb-3 text-sm">
              <span>{{ trim($a) }}</span><span class="bg-tint text-brand text-xs font-semibold px-3 py-1 rounded whitespace-nowrap">{{ trim($b) }}</span>
            </div>
          @endif
        @endforeach
      </div>
    </div>
  @endforeach
</div>
