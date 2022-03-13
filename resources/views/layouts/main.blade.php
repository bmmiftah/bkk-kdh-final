<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>BKK Muh Kandanghaur | {{ $title }}</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

      {{-- favicon --}}
      <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png">
      <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
      <link rel="manifest" href="/site.webmanifest">  

      {{-- bootsraps icons --}}
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

      {{-- AOS --}}
      <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    </head>
    <body>
    {{-- My Style --}}
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/navbar.css">
    {{-- <link rel="stylesheet" href="/css/login.css"> --}}
    
    @include('components.navbar')
    

    <div class="container-fluid p-0">
        @yield('container')
    </div>

    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    {{-- AOS --}}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>

    </body>
  </html>