<x-layout>
    <x-page-heading>New Expense</x-page-heading>

    <x-forms.form method="POST" action="/expenses">
        <x-forms.input label="Label" name="label" placeholder="Enter Name"/>
        <x-forms.input label="Amount" name="amount" placeholder="Example: $100"/>
        <x-forms.divider />
        <x-forms.button>Add</x-forms.button>
    </x-forms.form>
</x-layout>