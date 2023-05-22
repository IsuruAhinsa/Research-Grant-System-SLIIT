@if($slot == 'Pending')
    @php $color = 'warning'; @endphp
@elseif(str_contains($slot, 'Approved'))
    @php $color = 'success'; @endphp
@elseif(str_contains($slot, 'Rejected'))
    @php $color = 'danger'; @endphp
@else
    @php $color = 'primary'; @endphp
@endif

<div
    {!! $attributes->merge(['class' => "inline-flex items-center justify-center space-x-1 rtl:space-x-reverse min-h-6 px-2 py-0.5 text-sm font-medium tracking-tight rounded-xl whitespace-nowrap text-{$color}-700 bg-{$color}-500/10"]) !!}>
    {{\Illuminate\Support\Str::replace('-', ' ', $slot)}}
</div>
