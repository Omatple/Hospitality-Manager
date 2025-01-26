@props(['categoryCollection' => []])

<div class="grid grid-cols-2 md:grid-cols-4 gap-6">
    @foreach ($categoryCollection as $category)
        <x-categories.category-card :category="$category"/>
    @endforeach
</div>
