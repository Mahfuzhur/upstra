{{-- vars: $opening_id (nullable) --}}
<form method="post" action="{{ route('career.apply') }}" enctype="multipart/form-data" class="space-y-3" x-data="{ f: '' }">
  @csrf
  <input type="hidden" name="opening_id" value="{{ $opening_id ?? '' }}">
  <div class="grid grid-cols-2 gap-3">
    <input class="inp" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required>
    <input class="inp" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}">
  </div>
  <input class="inp" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
  <textarea class="inp" name="message" rows="4" placeholder="Message">{{ old('message') }}</textarea>
  <label class="flex items-center gap-3 cursor-pointer">
    <span class="w-9 h-9 rounded-full border border-brand text-brand grid place-items-center">↑</span>
    <span><b class="block text-sm" x-text="f || 'Upload Resume / CV'">Upload Resume / CV</b><span class="text-xs text-ink/60">PDF or DOC, up to 5MB</span></span>
    <input type="file" name="resume" accept=".pdf,.doc,.docx" class="hidden" @change="f = $event.target.files[0]?.name">
  </label>
  <button class="btn w-full !rounded-md !py-3.5">Submit →</button>
</form>
