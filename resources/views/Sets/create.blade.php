<x-app-layout>
    <x-slot name="header">
        <h2 class="py-2 text-xl font-semibold leading-tight text-gray-800">
            Add Set
        </h2>
    </x-slot>

    <x-container>
        <div class="mx-auto py-4">
            <x-validation-errors />
            <form action="/sets" method="post">
                @csrf
                <input type="hidden" name="workout_id" value="{{ request('workout_id') }}">
                <input type="hidden" name="exercise_id" value="{{ request('exercise_id') }}">
                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                    <x-label for="weight">Weight</x-label>
                    <div class="mb-4 mt-2 sm:col-span-2 sm:mt-0">
                        <input type="integer" name="weight" id="weight" class="block w-full max-w-lg rounded-md border-0 py-1.5 indent-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                    <x-label for="reps">Reps</x-label>
                    <div class="mb-4 mt-2 sm:col-span-2 sm:mt-0">
                        <input type="integer" name="reps" id="reps" class="block w-full max-w-lg rounded-md border-0 py-1.5 indent-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:pt-5">
                    <div class="flex justify-end gap-x-3">
                        <a href="/workouts/{{ request('workout_id') }}" class="block rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                            Cancel
                        </a>
                        <button type="submit" class="inline-flex justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Add</button>
                    </div>
                </div>
            </form>
        </div>
    </x-container>
</x-app-layout>
