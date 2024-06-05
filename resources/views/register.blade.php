<x-layout>
    <x-slot:heading>
        Register
    </x-slot>
<form method="POST" action="/register">
    @csrf
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <x-form-field class="sm:col-span-4">
                    <x-form-label for="name">Name</x-form-label>
                    <x-form-input type="name" name="name" id="name" placeholder="Name" value="{{ old('name') }}"/>
                    <x-form-error name='name'> </x-form-error>
                </x-form-field>
                <x-form-field class="sm:col-span-4">
                    <x-form-label for="surname">Surname</x-form-label>
                    <x-form-input type="surname" name="surname" id="surname" placeholder="Surname" value="{{ old('surname') }}"/>
                    <x-form-error name='surname'> </x-form-error>
                </x-form-field>
                <x-form-field class="sm:col-span-4">
                    <x-form-label for="email">Email</x-form-label>
                    <x-form-input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}" />
                    <x-form-error name='email'> </x-form-error>
                </x-form-field>
                <x-form-field class="sm:col-span-4">
                    <x-form-label for="password">Password</x-form-label>
                    <x-form-input type="password" name="password" id="password"/>
                    <x-form-error name='password'/>
                </x-form-field>
                <x-form-field class="sm:col-span-4">
                    <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                    <x-form-input type="password" name="password_confirmation" id="password_confirmation"/>
                    <x-form-error name='password_confirmation'/>
                </x-form-field>
            </div>
        </div>
    </div>
    <div class="mt-6 flex items-center justify-start gap-x-6">
        <a href="/" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
        <x-form-button type="submit">Save</x-form-button>
    </div>
</form>

</x-layout>
