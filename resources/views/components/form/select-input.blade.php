@props(['name', 'label' => '', 'options' => [], 'selected' => null, 'required' => false])

<div class="mb-6">
    @if ($label)
        <label for="{{ $name }}"
            class="block text-base font-medium text-gray-800 mb-2 hover:text-indigo-500 transition">
            {{ $label }}
        </label>
    @endif
    <select name="{{ $name }}" id="{{ $name }}" {{ $required ? 'required' : '' }}
        class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg shadow-md text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 hover:border-indigo-400 hover:shadow-lg transition duration-200">
        <option value="" disabled selected>Select an option</option>
        @foreach ($options as $value => $label)
            <option value="{{ $value }}" @selected(old($name, $selected) == $value)>
                {{ ucfirst($label) }}
            </option>
        @endforeach
    </select>
    <x-form.error-message :field="$name" />
</div>
