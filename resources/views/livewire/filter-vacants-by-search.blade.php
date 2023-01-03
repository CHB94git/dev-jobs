<div class="bg-gray-100 py-10">
    <h2 class="text-2xl md:text-4xl text-gray-600 text-center font-extrabold my-5">Search and Filter Jobs</h2>

    <div class="max-w-7xl mx-auto">
        <form wire:submit.prevent='readDataForm'>
            <div class="md:grid md:grid-cols-3 gap-5">
                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-700 uppercase font-bold " for="term">Search term
                    </label>
                    <input wire:model='term' id="term" type="text" placeholder="Search by term: ex. Laravel"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" />
                </div>

                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Category</label>
                    <select wire:model='category' class="border-gray-300 p-2 w-full rounded-md">
                        <option>--Select Option--</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Monthly Salary</label>
                    <select wire:model='salary' class="border-gray-300 p-2 w-full rounded-md">
                        <option>-- Select Option --</option>
                        @foreach ($salaries as $salary)
                            <option value="{{ $salary->id }}">{{ $salary->salary }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex justify-end">
                <input type="submit"
                    class="bg-teal-600 hover:bg-teal-700 transition-colors text-white text-sm font-bold px-10 py-2 rounded cursor-pointer uppercase w-full md:w-auto"
                    value="Search" />
            </div>
        </form>
    </div>
</div>
