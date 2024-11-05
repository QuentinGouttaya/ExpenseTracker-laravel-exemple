@props(['budgetSum'])

<x-layout>
    <x-page-heading>Foyer</x-page-heading>

    <section class="bg-white/5 rounded-xl">
        <h1 class="text-center font-bold text-5xl">Foyer: Budget is {{ $budgetSum }}</h1>
    </section>

    <section class="flex justify-center">
        <form class="my-5" action="/foyer/remove" method="POST">
            @csrf
            <input type="hidden" name="foyer_id" value="{{ $foyer_id }}">
            <x-forms.divider/>
            <x-forms.button class="hover:text-red-700 duration">Delete</x-forms.button>
        </form>
    </section>
</x-layout>
