<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-gray-800 my-3">
            {{ $vacant->title }}
        </h3>

        <div class="md:grid md:grid-cols-2 bg-gray-50 p-5 my-8 rounded">
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Company:
                <span class="normal-case font-normal">{{ $vacant->company }}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 my-3">Last day to apply:
                <span class="normal-case font-normal">{{ $vacant->last_day->toFormattedDateString() }}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 my-3">Category:
                <span class="normal-case font-normal">{{ $vacant->category->category }}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 my-3">Salary:
                <span class="normal-case font-normal">{{ $vacant->salary->salary }}</span>
            </p>
        </div>
    </div>

    <div class="md:grid md:grid-cols-6 gap-5">
        <div class="md:col-span-2">
            <img class="rounded" src="{{ asset('storage/vacants/' . $vacant->image) }}"
                alt="{{ 'Vacant Image ' . $vacant->title }}">
        </div>

        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5">
                Job Description
            </h2>
            <p>{{ $vacant->description }}</p>
        </div>
    </div>

    @guest
        <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center rounded">
            <p class="font-normal text-base">
                ¿Would you like to apply for this vacancy?
                <a href="{{ route('register') }}"> <span class="font-bold text-teal-700 text-xl">Get an account</span> and
                    apply for
                    this
                    and more
                    vacancies.</a>
            </p>
        </div>
    @endguest

    @cannot('create', App\Models\Vacant::class)
        <livewire:apply-vacant :vacant="$vacant" />
    @endcannot

</div>
