@props(['highlight' => FALSE, 'secondaryHref' => null])
<div @class(['highlight' => $highlight, 'card'])>
    {{ $slot }}
    <div class="py-4 text-right">
        @if ($secondaryHref)
            <a href="{{ $secondaryHref }}" class="btn btn-secondary">Edit Job</a>
        @endif
        <a {{ $attributes }} class="btn">View details</a>
    </div>
</div>
