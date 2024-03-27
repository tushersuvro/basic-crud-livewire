<!DOCTYPE html>
<html lang="en">
<head>
    <title>Clients Issues Crud with Livewire</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>

<div class="p-5 bg-primary text-white text-center">
    <h1>Clients Issues Crud with livewire</h1>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('issues') }}">Issues</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('issues.create') }}">Create an Issue</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12">
            {{ $slot }}
        </div>
    </div>
</div>

<div class="mt-5 p-4 bg-dark text-white text-center">
    <p>Footer</p>
</div>
@livewireScripts
</body>
</html>
