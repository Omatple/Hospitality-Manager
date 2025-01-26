@props(['tableCollection' => []])

<div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
    @foreach ($tableCollection as $table)
        <x-tables.table-card :table="$table" />
    @endforeach
</div>

