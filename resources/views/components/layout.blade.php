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
                <div class="space-x-8">
                    <a class="hover:before:scale-x-100 hover:before:origin-left relative before:w-full before:h-0.5 before:origin-right before:transition-transform before:duration-300 before:scale-x-0 before:bg-white/50 before:absolute before:left-0 before:bottom-0" href="/expenses">Expenses</a>
                    <a class="hover:before:scale-x-100 hover:before:origin-left relative before:w-full before:h-0.5 before:origin-right before:transition-transform before:duration-300 before:scale-x-0 before:bg-white/50 before:absolute before:left-0 before:bottom-0" href="/budget">Budget</a>
                    <a class="hover:before:scale-x-100 hover:before:origin-left relative before:w-full before:h-0.5 before:origin-right before:transition-transform before:duration-300 before:scale-x-0 before:bg-white/50 before:absolute before:left-0 before:bottom-0" href="/expenses/create">Add Expense</a>
                    <a class="hover:before:scale-x-100 hover:before:origin-left relative before:w-full before:h-0.5 before:origin-right before:transition-transform before:duration-300 before:scale-x-0 before:bg-white/50 before:absolute before:left-0 before:bottom-0" href="/foyer">Foyer</a>
                    <a class="hover:before:scale-x-100 hover:before:origin-left relative before:w-full before:h-0.5 before:origin-right before:transition-transform before:duration-300 before:scale-x-0 before:bg-white/50 before:absolute before:left-0 before:bottom-0" href="/expenses/types">Expense Types</a>
                </div>

                <div class="hover:scale-110 duration-300" >
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