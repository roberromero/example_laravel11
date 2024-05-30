<x-layout>
    <x-slot:heading>
        Jobs
    </x-slot>
    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href="/job/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200">
                <strong class="text-blue-500 block pb-3">{{ $job->employer->name }}</strong>
                <p>{{ $job['title'] }}</p>
            </a>
        @endforeach
    </div>
    <p class="mt-4">{{ $jobs->links() }}</p>
</x-layout>
