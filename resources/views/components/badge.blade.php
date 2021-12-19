@if (!isset($show) || $show) <!-- checks to see if the var isset and if it is that it is true -->
    <span class="badge badge-{{ $type ?? 'success' }} mb-4">
        {{ $slot }}
    </span>
@endif
