<form class="md:w-1/2 space-y-5" wire:submit.prevent='editVacant'>
    <div>
        <x-input-label for="title" :value="__('Vacancy Title')" />
        <x-text-input id="title" class="block mt-1 w-full" type="text" wire:model="title" :value="old('title')" />

        @error('title')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="salary" :value="__('Monthly Salary')" />
        <select id="salary" wire:model="salary"
            class="w-full border-gray-300 focus:border-teal-500 focus:ring-teal-500 rounded-md shadow-sm">
            <option value="">-- Select option --</option>
            @foreach ($salaries as $salary)
                <option value="{{ $salary->id }}">{{ $salary->salary }}</option>
            @endforeach
        </select>

        @error('salary')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="category" :value="__('Category')" />
        <select id="category" wire:model="category"
            class="w-full border-gray-300 focus:border-teal-500 focus:ring-teal-500 rounded-md shadow-sm">
            <option value="">-- Select option --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
        </select>

        @error('category')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="company" :value="__('Company')" />
        <x-text-input id="company" class="block mt-1 w-full" type="text" wire:model="company" :value="old('company')"
            placeholder="Company: ex. Netflix, Meta, Uber" />

        @error('company')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="last_day" :value="__('Last day to apply for the vacancy')" />
        <x-text-input id="last_day" class="block mt-1 w-full" type="date" wire:model="last_day"
            :value="old('last_day')" />

        @error('last_day')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="description" :value="__('Description')" />
        <textarea wire:model="description" id="description" placeholder="general job description, experience, etc."
            class="w-full border-gray-300 focus:border-teal-500 focus:ring-teal-500 rounded-md shadow-sm h-72"></textarea>

        @error('description')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="image" :value="__('Image')" />
        <x-text-input id="image" class="block mt-1 w-full" type="file" wire:model="new_image" accept="image/*" />

        <div class="my-5 w-80">
            <x-input-label :value="__('Current Image')" />
            <img src="{{ asset('storage/vacants/' . $image) }}" alt="{{ 'Vacant Image' . $title }}">
        </div>

        <div class="my-5 w-80">
            @if ($new_image)
                New Image:
                <img src="{{ $new_image->temporaryUrl() }}" alt="">
            @endif
        </div>

        @error('new_image')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <x-primary-button class="w-full
    justify-center">
        Save Changes
    </x-primary-button>
</form>
