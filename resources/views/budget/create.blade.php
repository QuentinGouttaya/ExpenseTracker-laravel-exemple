<x-layout>
    <x-page-heading>Set Budget</x-page-heading>

    <section class="flex justify-center bg-white/5 rounded-xl">
    <x-forms.form method="POST" action="/budget">
        <x-forms.input label="Amount" name="amount" placeholder="100"/>
        <x-forms.divider/>
        <x-forms.button>Add</x-forms.button>
    </x-forms.form>
    </section>
</x-layout>