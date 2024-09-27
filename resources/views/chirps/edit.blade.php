<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <!-- Form for updating a chirp -->
        <form method="POST" action="{{ route('chirps.update', $chirp) }}">
            <!-- CSRF token for form security -->
            @csrf 
            <!-- Use the PATCH method to update the chirp -->
            @method('patch')

            <!-- Textarea for editing the chirp message -->
            <!-- Display old input or the chirp's current message -->
            <textarea 
            name="message" 
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{old('message', $chirp->message)}}</textarea>
            <!--Display validation error -->
            <x-input-error :messages="$errors->get('message')" class="mt-2"/>
             <!-- Save and Cancel buttons-->
            <div class="mt-4 space-x-2">
                 <x-primary-button>{{__('Save')}}</x-primary-button>
                 <a href="{{route('chirps.index')}}">{{__('Cancel')}}</a>

            </div>
        </form>
    </div>
</x-app-layout>