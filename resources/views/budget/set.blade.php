<x-forms.form method="POST" action="/budget/update">
        <x-forms.input label="Amount" name="amount" placeholder="{{ isset($budget->amount) ? $budget->amount : 0 }}"/>
        <x-forms.divider/>
        <section class="flex justify-center">
        <x-forms.button>Add</x-forms.button>
        </section>

</x-forms.form>