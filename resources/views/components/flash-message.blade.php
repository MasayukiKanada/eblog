@props(['status' => 'info'])

@php
if(session('status') === 'info'){$bgColor = 'bg-blue-400';}
if(session('status') === 'alert'){$bgColor = 'bg-red-400';}
@endphp

@if (session('message'))
    <div class="{{ $bgColor ?? '' }} w-1/2 mx-auto px-5 py-3 text-white mb-8">
        {{ session('message') }}
    </div>
@endif
