<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'SimpleBlog') }}</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet" />

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    :root {
      --primary: #440080;
      --primary-light: #5500a3;
      --primary-dark: #33005c;
      --secondary: #666666;
      --secondary-light: #808080;
      --secondary-dark: #4d4d4d;
      --success: #00802b;
      --danger: #cc0000;
      --warning: #cc7700;
      --info: #0066cc;
      --white: #ffffff;
      --black: #000000;
      --background: #f5f5f5;
    }

    body {
      font-family: 'Space Grotesk', sans-serif;
    }
  </style>
</head>

<body class="min-h-screen bg-[var(--background)] text-[var(--black)]">
  <x-navbar />

  <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    {{ $slot }}
  </main>

  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
  <script>
    lucide.createIcons();
  </script>
</body>

</html>
