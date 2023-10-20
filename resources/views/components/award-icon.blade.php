@props([
    'award' => $award
])

@if(isset($award->awardIcon->icon))
<span class="align-items-center d-inline-flex h-25 justify-content-center rounded w-25 p-1" style="background-color: {{ $award->color_code.'20' }};">
    <i class="bx bx-{{ $award->awardIcon->icon }} f-15 text-white appreciation-icon" style="color: {{ $award->color_code }}  !important"></i>
</span>

@endif
