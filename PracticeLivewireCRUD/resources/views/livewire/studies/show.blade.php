<?php

use App\Models\Study;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.app')] class extends Component {
    // Property to hold the study instance
    public $study;

    // Initialize component with the study data
    public function mount(Study $study)
    {
        $this->study = $study;
    }
};
?>

<div class="space-y-6 max-w-2xl mx-auto">
    {{-- Page Header --}}
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <flux:heading size="xl">Study Details</flux:heading>
            <flux:subheading>View all information for this study topic.</flux:subheading>
        </div>
        <flux:button :href="route('studies.index')" variant="primary" icon="arrow-left" wire:navigate>
            Back To Studies
        </flux:button>
    </div>

    <div class="rounded-lg border border-zinc-200 bg-white p-8 dark:border-zinc-700 dark:bg-zinc-800 space-y-6">
        <div class="flex flex-col gap-2">
            <span class="text-xs font-medium text-zinc-500 dark:text-zinc-400">Title</span>
            <span class="text-lg font-bold text-zinc-900 dark:text-white">{{ $study->title }}</span>
        </div>
        <div class="flex flex-col gap-2">
            <span class="text-xs font-medium text-zinc-500 dark:text-zinc-400">Description</span>
            <span class="text-zinc-700 dark:text-zinc-300">{{ $study->description ?: '—' }}</span>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex flex-col gap-2">
                <span class="text-xs font-medium text-zinc-500 dark:text-zinc-400">Status</span>
                @if($study->status === 'Completed')
                    <flux:badge size="sm" color="green">Completed</flux:badge>
                @elseif($study->status === 'InProgress')
                    <flux:badge size="sm" color="yellow">In Progress</flux:badge>
                @else
                    <flux:badge size="sm" color="gray">Not Started</flux:badge>
                @endif
            </div>
            <div class="flex flex-col gap-2">
                <span class="text-xs font-medium text-zinc-500 dark:text-zinc-400">Priority</span>
                @if($study->priority === 'High')
                    <flux:badge size="sm" color="red">High</flux:badge>
                @elseif($study->priority === 'Medium')
                    <flux:badge size="sm" color="orange">Medium</flux:badge>
                @else
                    <flux:badge size="sm" color="blue">Low</flux:badge>
                @endif
            </div>
            <div class="flex flex-col gap-2">
                <span class="text-xs font-medium text-zinc-500 dark:text-zinc-400">Category</span>
                <flux:badge size="sm" color="zinc">{{ $study->category }}</flux:badge>
            </div>
            <div class="flex flex-col gap-2">
                <span class="text-xs font-medium text-zinc-500 dark:text-zinc-400">Start Date</span>
                <span class="text-zinc-700 dark:text-zinc-300">{{ $study->start_date ? $study->start_date->format('M d, Y') : 'Not set' }}</span>
            </div>
            <div class="flex flex-col gap-2">
                <span class="text-xs font-medium text-zinc-500 dark:text-zinc-400">End Date</span>
                <span class="text-zinc-700 dark:text-zinc-300">{{ $study->end_date ? $study->end_date->format('M d, Y') : 'Not set' }}</span>
            </div>
        </div>
        <div class="flex gap-3 justify-end pt-4">
            <flux:button :href="route('studies.edit', $study)" variant="ghost" icon="pencil" wire:navigate>Edit</flux:button>
            <flux:button :href="route('studies.index')" variant="outline" icon="arrow-left" wire:navigate>Back</flux:button>
        </div>
    </div>
</div>
