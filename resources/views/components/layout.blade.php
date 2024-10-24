<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-black text-white font-roboto">
    <div class="px-2 py-1">
        <nav class="flex justify-between items-center py-2 border-b border-white/40">
            <div>
                <a href="/">
                    <img src="{{Vite::asset('resources/img/logo.svg')}}" alt="">
                </a>
            </div>
            @auth
                <div class="space-x-8 font-bold">
                    <a href="/expenses">Expenses</a>
                    <a href="/budget">Budget</a>
                    <a href="/expenses/create">Add Expense</a>
                </div>

                <div>
                    <a href="/logout">Logout</a>
                </div>
            @endauth
            @guest
                <div class="space-x-6 font-bold">
                    <a href="/register">Sign Up</a>
                    <a href="/login">Log In</a>
                </div>
            @endguest

        </nav>

        <main class="mt-10">
            {{ $slot }}
        </main>
    </div>
</body>

</html>