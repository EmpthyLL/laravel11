<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  </head>
<body class="h-full">
  <div class="min-h-full">
    <x-navbar/>
    <x-header>{{ $title }}</x-header>
    {{ $slot }}
  </div>
  
</body>
<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<script src="./node_modules/preline/dist/preline.js"></script>
<script>
  document.addEventListener('trix-file-accept', function(e){
    e.preventDefault();
  })
</script>
</html>