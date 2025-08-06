<x-layout>
    <h2>{{ $company->name }}</h2>
    <div class="py-4">{{ $company->description }}</div>
    <div class="flex justify-center content-center">
        <div class="px-4">
            <a href="{{ route('companies.edit', $company->id) }}" class="btn py-3 block">Edit Company</a>
        </div>
        <div class="px-4">
            <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="my-4 btn" type="submit">Delete</button>
            </form>
        </div>
    </div>
    <h2>Jobs in this company</h2>
    <ul>
        @foreach($jobs as $job)
            <li>
                <x-card
                    href="{{ route('jobs.show', $job->id) }}"
                    :secondary-href="route('jobs.edit', $job->id)"
                    :highlight="$job->id == 1">
                    <div class="flex w-full justify-between">
                        <h3>{{ $job->title }}</h3>
                        <span class="my-4">{{ $job->location }} | {{ $job->employment_type }}</span>
                    </div>
                    <div class="py-4">{{ $job->description }}</div>
                </x-card>
            </li>
        @endforeach
    </ul>
    {{ $jobs->links() }}
</x-layout>
