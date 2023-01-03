<div>

    <livewire:filter-vacants-by-search />

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-700 mb-12">
                Our available vacancies
            </h3>

            <div class="bg-white shadow-sm rounded-lg p-6 divide-y divide-gray-200">
                @forelse ($vacants as $vacant)
                    <div class="md:flex md:justify-between md:items-center py-5">
                        <div class="md:flex-1">
                            <a href="{{ route('vacants.show', $vacant->id) }}"
                                class="text-3xl font-extrabold text-gray-600 hover:text-gray-700">
                                {{ $vacant->title }}
                            </a>
                            <p class="text-base text-gray-600 mb-1">{{ $vacant->company }}</p>
                            <p class="text-xs font-bold text-gray-600 mb-1">{{ $vacant->category->category }}</p>
                            <p class="text-base text-gray-600 mb-1">{{ $vacant->salary->salary }}</p>
                            <p class="font-bold text-xs text-gray-600">
                                Last day to apply:
                                <span class="font-normal">{{ $vacant->last_day->format('d/m/Y') }}</span>
                            </p>
                        </div>

                        <div class="mt-5 md:mt-0">
                            <a href="{{ route('vacants.show', $vacant->id) }}"
                                class="bg-teal-600 p-3 text-sm uppercase font-bold text-white rounded-lg hover:bg-teal-700 block text-center">See
                                Vacant</a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-600">
                        No vacants yet
                    </p>
                @endforelse
            </div>
        </div>
    </div>
</div>
