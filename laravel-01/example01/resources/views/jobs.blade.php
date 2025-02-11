<x-layout>
    <x-slot:heading>
       Job listing.
    </x-slot>
    <h1> Hello from the jobs page.</h1>
    <ul>
        @foreach ($jobs as $job)
            <li>
                <a href="/jobs/{{ $job['id'] }}" class="text-blue-500 hover:underline">
                <strong>{{ $job['title'] }} </strong> 
                {{-- Pays: {{ $job['salary']}} $ per year. --}}
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>
    
