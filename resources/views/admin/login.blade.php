<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin login | UPSTRA</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen grid place-items-center p-5">
<form method="post" action="{{ url('/admin/login') }}" class="bg-white rounded-xl shadow p-8 w-full max-w-sm space-y-4">
  @csrf
  <h1 class="text-3xl font-extrabold text-[#D6202B]">UPSTRA</h1>
  <p class="text-sm text-gray-500">Sign in to manage the website.</p>
  @error('email')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
  <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required class="w-full border rounded-lg px-3 py-2.5 text-sm">
  <input type="password" name="password" placeholder="Password" required class="w-full border rounded-lg px-3 py-2.5 text-sm">
  <label class="flex items-center gap-2 text-sm text-gray-600"><input type="checkbox" name="remember"> Remember me</label>
  <button class="w-full bg-[#D6202B] text-white rounded-lg py-2.5 font-medium">Sign in</button>
</form>
</body>
</html>
