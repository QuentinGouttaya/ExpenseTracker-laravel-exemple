@props(['foyerBalance','budgetSum'])

<x-layout>
    <x-page-heading>Foyer</x-page-heading>

    <section class="flex justify-center py-5">
        <div class="flex flex-col">
        <span class="text-center font-bold text-5xl">Foyer: Budget is {{ $budgetSum }}</span>

        <span class="py-20 text-center font-bold text-5xl">Foyer: Balance is {{ $foyerBalance }}</span>
        </div>
    </section>

    <section class="flex justify-center">
        <form class="" action="/foyer/remove" method="POST">
            @csrf
            <input type="hidden" name="foyer_id" value="{{ $foyer_id }}">
            <x-forms.divider/>
            <x-forms.button class="hover:text-red-700 duration">Delete</x-forms.button>
        </form>
    </section>
</x-layout>
