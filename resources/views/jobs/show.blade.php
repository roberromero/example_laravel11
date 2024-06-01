<x-layout>
    <x-slot:heading>
        Job
    </x-slot>
        <h1>{{ $job->title }}</h1>
        <h2 class="pb-5">{{'The expected salary is ' . $job->salary}}</h2>
        <x-button href="/jobs/create" type="button">
            Edit
        </x-button>
</x-layout>
