<x-app-layout>

<!-- main container for the form -->
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
<!-- 
    form to submit a new chirp -->
        <form method="POST" action="{{ route('chirps.store') }}">
            @csrf<!-- CSRF token for security to prevent cross-site request forgery -->
            <!-- textarea for the user to input information -->
            <textarea
                name="message"
                placeholder="{{ __('What\'s on your mind?') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message') }}</textarea>

            <!-- component to display validation errors in the message field -->
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Chirp') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>