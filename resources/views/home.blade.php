<x-layout>

@if (auth()->user() === null)
    <h7 class="text-center font-bold">Please Login</h7>
@else
    @auth
        <h7 class="text-center font-bold">Welcome back {{ auth()->user()->first_name }}</h7>
    @endauth

    <h1 class="text-center font-bold text-5xl">Expense</h1>
@endif
</x-layout>