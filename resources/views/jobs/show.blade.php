<x-layout>
    <h2>{{ $job->title }}</h2>
    <div class="py-4">{{ $job->description }}</div>
    <div class="py-4">{{ $job->location }}</div>
    <div class="py-4">{{ $job->employment_type }}</div>
    <a href="{{ route('jobs.index') }}" class="btn py-4 block max-w-max">Back to job list</a>
</x-layout>
