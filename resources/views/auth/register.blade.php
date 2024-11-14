<x-layout>
    <x-page-heading clas>Register</x-page-heading>
    <div class="flex">
        <x-forms.form method="POST" action="/register" enctype="multipart/form-data">
            <x-forms.input label="First Name" name="first_name" />
            <x-forms.input label="Last Name" name="last_name" />
            <x-forms.input label="Email" name="email" type="email" />
            <x-forms.input label="Password" name="password" type="password" />
            <x-forms.input label="Password Confirmation" name="password_confirmation" type="password" />

            <x-forms.divider />

            <div class="flex justify-center">
                <x-forms.button>Create Account</x-forms.button>
            </div>
        </x-forms.form>
    </div>
</x-layout>