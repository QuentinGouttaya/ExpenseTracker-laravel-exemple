<x-layout>
    <x-page-heading>Set Budget</x-page-heading>

    <x-forms.form method="POST" action="/budget">
        <x-forms.input label="Amount" name="amount" placeholder="100"/>
        <x-forms.divider/>
        <x-forms.button>Add</x-forms.button>
    </x-forms.form>
</x-layout>