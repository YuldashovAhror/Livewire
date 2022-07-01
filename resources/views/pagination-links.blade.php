@if ($paginator->hasPages())
    <ul class="flex justify-items-center">
        <li class="w-6 px-2 py-1 text-center rounded border shadow bg-white" wire:click="previousPage">Prev</li>
        <li class="w-6 px-2 py-1 text-center rounded border shadow bg-white" wire:click="nextPage" style="margin-left: 55rem">Next</li>
    </ul>
@endif