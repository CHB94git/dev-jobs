<div class="bg-gray-100 rounded p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">
        apply for this vacancy
    </h3>

    @if (session()->has('message'))
        <div class="uppercase border border-green-600 bg-green-100 text-green-700 font-bold p-2 my-5 text-sm rounded-md"
            x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 7000)">
            {{ session()->get('message') }}
        </div>
    @else
        <form wire:submit.prevent='applyVacant' class="w-96 mt-5">
            <div class="mb-5">
                <x-input-label for="cv" :value="__('Curriculum (PDF)')" />
                <x-text-input wire:model="cv" id="cv" type="file" accept=".pdf" class="block mt-2 w-full" />
            </div>

            @error('cv')
                <livewire:show-alert :message="$message" />
            @enderror

            <x-primary-button class="w-full justify-center my-5">
                {{ __('Apply') }}
            </x-primary-button>
        </form>
    @endif

</div>
