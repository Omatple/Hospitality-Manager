@props([
    'type' => 'text',
    'name',
    'label' => '',
    'value' => '',
    'placeholder' => '',
    'required' => false,
])

<div class="mb-6">
    @if ($label)
        <label for="{{ $name }}"
            class="block text-base font-medium text-gray-800 mb-2 hover:text-indigo-500 transition">
            {{ $label }}
        </label>
    @endif
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }} step="any"
        class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg shadow-md text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 hover:border-indigo-400 hover:shadow-lg transition duration-200 placeholder-gray-400">
    <x-form.error-message :field="$name" />
</div>
