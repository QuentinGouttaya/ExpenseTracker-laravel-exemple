<x-layout>
    <x-page-heading>Expense Types</x-page-heading>

    <section class="flex justify-center">
        <x-forms.form method="POST" action="/expenses/types">
            @csrf
            <x-forms.input label="Name" name="name" placeholder="Enter Name"/>
            <div class="flex justify-center mt-5">
                <x-forms.button>Add</x-forms.button>
            </div>
        </x-forms.form>
</x-layout>