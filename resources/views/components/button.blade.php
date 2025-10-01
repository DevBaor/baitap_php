@props(['variant' => 'primary'])
@php
$bg = $variant==='danger' ? '#EF4444' : '#3B82F6';
@endphp
<button {{ $attributes->merge(['style'=>"padding:8px 12px;border:0;border-radius:8px;background:$bg;color:white;cursor:pointer"]) }}>
  {{ $slot }}
</button>
