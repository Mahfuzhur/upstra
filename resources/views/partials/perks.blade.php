<h2 class="{{ ($big ?? false) ? 'font-head font-bold text-3xl' : 'h2 !text-2xl md:!text-3xl' }}">{{ cms('career.perks_title') }}</h2>
@unless($big ?? false)<p class="text-sm text-ink/80 mt-3 max-w-md">{{ cms('career.perks_text') }}</p>@endunless
@php $perks = lines(cms('career.perks')); $rows = (int) ceil(count($perks) / 3); @endphp
<div class="mt-8 grid md:grid-cols-3 gap-x-10 gap-y-5">
  @foreach($perks as $i => $p)
    {{-- fill column by column like the design --}}
    @php $idx = intdiv($i, 3) + ($i % 3) * $rows; $p = $perks[$idx] ?? null; @endphp
    @if($p)
    <div class="flex items-center gap-4 text-sm">
      <span class="w-11 h-11 shrink-0 rounded-full grid place-items-center {{ $idx % 2 ? 'bg-soft' : 'bg-tint' }} text-brand">✓</span>{{ $p }}
    </div>
    @endif
  @endforeach
</div>
