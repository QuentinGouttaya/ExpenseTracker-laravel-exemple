<x-layout>
    <x-page-heading>Login</x-page-heading>

    <div class="flex">
    <x-forms.form method="POST" action="/login" enctype="multipart/form-data">
        <x-forms.input label="Email" name="email" type="email" />
        <x-forms.input label="Password" name="password" type="password" />

        <x-forms.divider />
        <div class="flex justify-center">
        <x-forms.button>Login</x-forms.button>
        </div>

    </x-forms.form>
    </div>

</x-layout>