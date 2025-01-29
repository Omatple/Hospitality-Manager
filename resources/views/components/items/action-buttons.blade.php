@props([
    'infoUrl' => '#',
    'infoButtonText' => '',
    'infoShowButton' => false,
    'editUrl' => '#',
    'editButtonText' => '',
    'editShowButton' => true,
    'deleteUrl' => '#',
    'deleteButtonText' => '',
    'deleteShowButton' => true,
    'class' => 'flex justify-end pt-4 px-2 pb-6 space-x-2 w-full',
])

<div class="{{ $class }}">
    @if ($infoShowButton)
        <x-buttons.info-button :url="$infoUrl" :buttonText="$infoButtonText" />
    @endif
    @if ($editShowButton)
        <x-buttons.edit-button :url="$editUrl" :buttonText="$editButtonText" />
    @endif
    @if ($deleteShowButton)
        <x-buttons.delete-button :url="$deleteUrl" :buttonText="$deleteButtonText" />
    @endif
</div>
