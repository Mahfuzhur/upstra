@extends('admin.layout')
@section('title', $c['label'])
@section('content')
<div class="bg-white rounded-xl shadow-sm p-6">
  <dl class="space-y-4 text-sm">
    @foreach($item->getAttributes() as $k => $v)
      <div><dt class="text-gray-500">{{ ucwords(str_replace('_', ' ', $k)) }}</dt>
        <dd class="mt-0.5 whitespace-pre-line">
          @if($k === 'resume' && $v)<a class="text-brand underline" href="{{ route('admin.resume', $item->id) }}">Download resume</a>@else{{ $v }}@endif
        </dd></div>
    @endforeach
  </dl>
  <a href="{{ route('admin.res.index', $c['key']) }}" class="inline-block mt-6 text-sm text-brand">← Back</a>
</div>
@endsection
