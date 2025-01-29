@props(['name', 'label' => '', 'defaultImage' => '', 'required' => false])

<div class="mb-6">
    @if ($label)
        <label for="{{ $name }}"
            class="block text-base font-medium text-gray-800 mb-2 hover:text-indigo-500 transition">
            {{ $label }}
        </label>
    @endif
    <div class="relative w-32 h-32 rounded-lg overflow-hidden shadow-md border border-gray-300 bg-gray-100">
        <img id="{{ $name }}-preview" src="{{ $defaultImage }}" alt="Preview" class="w-full h-full object-cover">
    </div>
    <input type="file" name="{{ $name }}" id="{{ $name }}" accept="image/*"
        class="w-full mt-4 px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg shadow-md text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 hover:border-indigo-400 hover:shadow-lg transition duration-200"
        {{ $required ? 'required' : '' }} onchange="previewImage(event, '{{ $name }}-preview')">

    <x-form.error-message :field="$name" />
</div>
<script>
    function previewImage(event, previewId) {
        const file = event.target.files[0];
        const preview = document.getElementById(previewId);

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
</script>
