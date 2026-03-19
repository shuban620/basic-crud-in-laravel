<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts CRUD</title>
    @livewireStyles
</head>
<body style="font-family: Arial, sans-serif; max-width: 900px; margin: 30px auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
    <h1 style="font-style: italic; background-color: #f0f0f0; padding: 10px; text-align: center;">Posts CRUD</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {{ $slot ?? '' }}
    @yield('content')

    @livewireScripts
</body>
</html>
