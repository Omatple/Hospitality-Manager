@props(['name', 'label' => '', 'value' => '#ce93d8', 'required' => false])

<div class="mb-6">
    @if ($label)
        <label for="{{ $name }}"
            class="block text-base font-medium text-gray-800 mb-2 hover:text-indigo-500 transition">
            {{ $label }}
        </label>
    @endif

    <input type="color" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}"
        {{ $required ? 'required' : '' }}
        class="w-full h-12 px-3 bg-gray-50 border border-gray-300 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 hover:border-indigo-400 hover:shadow-lg transition duration-200 cursor-pointer">

    <x-form.error-message :field="$name" />
</div>
