@props(['trigger'])

<div x-data="{ show: false }" @click.away="show = false">
    {{-- Trigger --}}
    <div @click="show = ! show">
        {{ $trigger }}
    </div>


    {{-- Link --}}
    <div x-show="show" class="py-2 absolute w-full bg-gray-100 mt-2 rounded-xl z-50 overflow-auto max-h-52" style="display: none">
        {{ $slot }}
    </div>

</div>
