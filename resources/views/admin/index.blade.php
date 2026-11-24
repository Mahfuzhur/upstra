@extends('admin.layout')
@section('title', $c['label'])
@section('content')
@unless($c['readonly'] ?? false)
  <a href="{{ route('admin.res.create', $c['key']) }}" class="inline-block mb-4 bg-brand text-white rounded-lg px-5 py-2 text-sm font-medium">+ Add new</a>
@endunless
<div class="bg-white rounded-xl shadow-sm overflow-x-auto">
  <table class="w-full text-sm">
    <thead class="bg-gray-50 text-left text-gray-500">
      <tr>@foreach($c['columns'] as $col)<th class="px-4 py-3 font-medium">{{ ucwords(str_replace('_', ' ', $col)) }}</th>@endforeach<th></th></tr>
    </thead>
    <tbody>
      @forelse($rows as $row)
        <tr class="border-t">
          @foreach($c['columns'] as $col)
            <td class="px-4 py-3">
              @php $v = $row->$col; @endphp
              @if(in_array($col, $c['files'] ?? []))
                @if($v)<a class="text-brand underline" href="{{ route('admin.resume', $row->id) }}">Download</a>@endif
              @elseif($v instanceof \Carbon\Carbon){{ $v->format('d M Y') }}
              @elseif(is_bool($v)){{ $v ? 'Yes' : 'No' }}
              @else{{ \Illuminate\Support\Str::limit((string) $v, 60) }}@endif
            </td>
          @endforeach
          <td class="px-4 py-3 text-right whitespace-nowrap">
            @if($c['readonly'] ?? false)
              <a href="{{ route('admin.res.show', [$c['key'], $row->id]) }}" class="text-brand mr-3">View</a>
            @else
              <a href="{{ route('admin.res.edit', [$c['key'], $row->id]) }}" class="text-brand mr-3">Edit</a>
            @endif
            <form method="post" action="{{ route('admin.res.destroy', [$c['key'], $row->id]) }}" class="inline" onsubmit="return confirm('Delete this item?')">
              @csrf @method('DELETE')<button class="text-gray-500 hover:text-red-600">Delete</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="{{ count($c['columns']) + 1 }}" class="px-4 py-8 text-center text-gray-500">Nothing here yet.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
<div class="mt-4">{{ $rows->links() }}</div>
@endsection
