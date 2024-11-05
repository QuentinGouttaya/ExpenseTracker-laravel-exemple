<x-layout>
    <x-page-heading>New Expense</x-page-heading>

    <section class="flex justify-center bg-white/5 rounded-xl">
        <x-forms.form method="POST" action="/expenses">
            @csrf
            <x-forms.input label="Label" name="label" placeholder="Enter Name"/>
            <x-forms.input label="Amount" name="amount" placeholder="Example: $100"/>
            <div class="flex justify-center mt-5">
                <x-forms.button>Add</x-forms.button>
            </div>
        </x-forms.form>
    </section>
</x-layout>