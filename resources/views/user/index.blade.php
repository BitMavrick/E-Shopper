<x-user.master>

    <x-slot name="title">
        {{ $title ?? 'Home | E-Shopper' }}
    </x-slot>

    <x-user.partials.topbar />
    <x-user.partials.navbar />
    <x-user.partials.featured />
    <x-user.partials.categories />
    <x-user.partials.offer />
    <x-user.partials.trend />
    <x-user.partials.subscribe />
    <x-user.partials.new />
    <x-user.partials.vendor />
    <x-user.partials.footer />
</x-user.master>