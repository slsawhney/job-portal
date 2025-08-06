<x-layout>
    <h2>Current Companies</h2>
    <ul>
        @foreach($companies as $company)
            <li>
                <x-card href="{{ route('companies.show', $company->id) }}">
                    <h3>{{ $company->name }}</h3>
                    <div class="py-4">{{ $company->description }}</div>
                </x-card>
            </li>
        @endforeach
    </ul>
    {{ $companies->links() }}
</x-layout>

