<x-layout>
    <h2>Current Jobs</h2>
    <ul>
        @foreach($jobs as $job)
            <li>
                <x-card
                    href="{{ route('jobs.show', $job->id) }}"
                    :secondary-href="$job->company->owner_id === Auth::id() ? route('jobs.edit', $job->id) : null"
                    :highlight="$job->company->owner_id == Auth::id()">
                    <div class="flex w-full justify-between">
                        <h3>{{ $job->title }}</h3>
                        <span class="my-4">{{ $job->location }} | {{ $job->employment_type }}</span>
                    </div>
                    <div class="py-4">
                        {{ $job->description }}
                    </div>
                </x-card>
            </li>
        @endforeach
    </ul>
    {{ $jobs->links() }}
</x-layout>

