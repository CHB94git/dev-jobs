<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold text-center my-10">My Notifications</h1>

                    <div class="divide-y divide-gray-200">

                        @forelse ($notifications as $notification)
                            <div class="p-5 rounded lg:flex lg:justify-between lg:items-center">
                                <div>
                                    <p>You have a new candidate in: <span
                                            class="font-bold text-lg">{{ $notification->data['name_vacant'] }}</span></p>

                                    <p class="text-base font-bold text-teal-700">
                                        {{ $notification->created_at->diffForHumans() }}</p>
                                </div>

                                <div class="mt-5 lg:mt-0">
                                    <a href="{{ route('candidates.index', $notification->data['vacant_id']) }}"
                                        class="bg-teal-600 p-3 text-sm uppercase font-bold text-white rounded-xl hover:bg-teal-700">See
                                        candidates</a>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-600">
                                There are no new notifications.
                            </p>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
