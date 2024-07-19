<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/js/app.js')
</head>

<body>
    <div>
        <div>
            <x-navbar></x-navbar>
        </div>
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
