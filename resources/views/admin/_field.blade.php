{{-- vars: $name, $label, $type, $value, optional $dot (old() key) --}}
@php
  $val = old($dot ?? $name, $value);
  if ($type === 'date' && $val) { $val = \Carbon\Carbon::parse($val)->format('Y-m-d'); }
@endphp
<div>
  <label class="block text-sm font-medium text-gray-700 mb-1">{{ $label }}</label>
  @if($type === 'textarea' || $type === 'list')
    <textarea name="{{ $name }}" rows="{{ $type === 'list' ? 7 : 4 }}" class="w-full border rounded-lg px-3 py-2 text-sm bg-white">{{ $val }}</textarea>
    @if($type === 'list')<p class="text-xs text-gray-500 mt-1">One item per line. Parts of a line are separated with the | character where the label says so.</p>@endif
  @elseif($type === 'image' || $type === 'file')
    @if($value)<p class="text-xs text-gray-500 mb-1">Current file: {{ $value }}</p>@endif
    <input type="file" name="{{ $name }}" @if($type === 'image') accept="image/*" @endif class="text-sm">
    @if($value && isset($removeName))<label class="block text-xs text-gray-500 mt-1"><input type="checkbox" name="{{ $removeName }}" value="1"> Remove current file</label>@endif
  @elseif($type === 'checkbox')
    <input type="hidden" name="{{ $name }}" value="0">
    <label class="text-sm"><input type="checkbox" name="{{ $name }}" value="1" @checked($val)> Yes</label>
  @elseif($type === 'date')
    <input type="date" name="{{ $name }}" value="{{ $val }}" class="border rounded-lg px-3 py-2 text-sm bg-white">
  @elseif($type === 'number')
    <input type="number" name="{{ $name }}" value="{{ $val ?? 0 }}" class="border rounded-lg px-3 py-2 text-sm bg-white w-32">
  @else
    <input type="text" name="{{ $name }}" value="{{ $val }}" class="w-full border rounded-lg px-3 py-2 text-sm bg-white">
  @endif
</div>
