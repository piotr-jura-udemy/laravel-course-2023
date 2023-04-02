<!DOCTYPE html>
<html>

<head>
  <title>Laravel 10 Task List App</title>
  <script src="https://cdn.tailwindcss.com"></script>

  {{-- blade-formatter-disable --}}
  <style type="text/tailwindcss">
    .btn {
      @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50
    }

    .link {
      @apply font-medium text-gray-700 underline decoration-pink-500
    }
  </style>
  {{-- blade-formatter-enable --}}

  @yield('styles')
</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg">
  <h1 class="mb-4 text-2xl">@yield('title')</h1>
  <div>
    @if (session()->has('success'))
      <div>{{ session('success') }}</div>
    @endif

    @yield('content')
  </div>
</body>

</html>
