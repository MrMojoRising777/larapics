<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
  @php
   $icon = "logo.svg"   
  @endphp
  <x-icon :src="$icon" />
  <x-ui.button />
  <x-alert type="success" dismissible id="my-alert" class="mt-4" role="flash">
    <x-slot:title>
      Success
    </x-slot>
    <p class="mb-0">Data has been sent</p>
  </x-alert>
</body>
</html>