<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- AlpineJS CDN -->
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link
      rel="preconnect"
      href="https://fonts.googleapis.com" />
    <link
      rel="preconnect"
      href="https://fonts.gstatic.com"
      crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
      rel="stylesheet" />

    <style>
      * {
        font-family: 'Inter', sans-serif;
      }
    </style>
  </head>
  <body class="bg-gray-100">
    <header>
      <!-- Navigation -->
        @include('layouts.header.nav')
    </header>

    <main
    class="container max-w-xl mx-auto space-y-8 mt-8 px-2 md:px-0 min-h-screen">
        @section('main-content')

        @show
    </main>

    {{-- footer --}}
@include('layouts.footer.footer')
  </body>
</html>