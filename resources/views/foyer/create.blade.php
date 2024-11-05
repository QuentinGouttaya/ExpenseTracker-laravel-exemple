<x-layout>
    <x-page-heading>Create Foyer / Add into Foyer</x-page-heading>

    <section class="flex justify-center bg-white/5 rounded-xl">
        <x-forms.form method="POST" action="/foyer/store"> 
            <x-forms.button>Create</x-forms.button>
        </x-forms.form>
    </section>
    <section class="flex justify-center bg-white/5 rounded-xl">
        <x-forms.form method="POST" action="/foyer/add">
            <x-forms.divider/>
            <x-forms.input class="w-96" type="email" name="user_email" label="email of a user from your foyer"/>
            <x-forms.divider/>
            <section class="flex justify-center">
            <x-forms.button>Add</x-forms.button>
            </section>
        </x-forms.form>
    </section>

    
</x-layout>