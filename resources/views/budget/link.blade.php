<x-layout>
    <x-page-heading>Link Budget</x-page-heading>

    <section class="p-8 bg-white/5 rounded-xl">
        <h1 class="text-3xl">Enter the required informations :</h1>
        <x-forms.form class="py-16" method="POST" action="/budget/update">
        <x-forms.input label="Email" name="email" placeholder="exemple@exemple.net"/>
        <x-forms.divider/>
        <x-forms.button>Link this email</x-forms.button>
</x-forms.form>


    </section>
</x-layout>