<x-layout>
    <x-slot:heading>
        Create
    </x-slot>
<form method="POST" action="/jobs">
    @csrf
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <x-form-field class="sm:col-span-4">
                    <x-form-label for="title">Title</x-form-label>
                    <x-form-input type="text" name="title" id="title" placeholder="Example: Programmer" />
                    <x-form-error name='title'> </x-form-error>
                </x-form-field>
                <x-form-field class="sm:col-span-4">
                    <x-form-label for="salary">Salary</x-form-label>
                    <x-form-input name="salary" id="salary" placeholder="Example: £50,000"/>
                    <x-form-error name='salary'/>
                </x-form-field>
            </div>
        </div>
    </div>
    <div class="mt-6 flex items-center justify-start gap-x-6">
        <a href="/jobs" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
        <x-form-button type="submit">Save</x-form-button>
    </div>
</form>

</x-layout>
