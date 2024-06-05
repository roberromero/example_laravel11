<x-layout>
    <x-slot:heading>
        Job
    </x-slot>
        <h1>{{ $job->title }}</h1>
        <h2 class="pb-5">{{'The expected salary is ' . $job->salary}}</h2>
        <!--FOR FIST OPTION://**/can*('edit-job', $job)-->
        @can('edit', $job)
            <x-button href="/jobs/{{$job->id}}/edit" type="button">Edit</x-button>
        @endcan
        
</x-layout>
