<x-layout>
    <x-slot:heading>
        Job
    </x-slot>
        <h1>{{ $job['title'] }}</h1>
        <h2>{{'The expected salary is ' . $job['salary']}}</h2>
</x-layout>
