<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Laravel 11 example app</title>
</head>
<body class="h-full">
<div class="min-h-full">
<x-nav></x-nav>

  <header class="bg-white shadow flex justify-between items-center">
    <div class="px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{$heading}}</h1>
    </div>
    <!-- Create Button -->
    @auth
      <div class="px-4 py-6 cursor-pointer">
        <x-button href="/jobs/create">Create</x-button>
      </div>
    @endauth
  </header>
  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      {{$slot}}
    </div>
  </main>
</div>

</body>
</html>
