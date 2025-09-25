<?php

use App\Models\Study;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Livewire\WithPagination;

new #[Layout('components.layouts.app')] class extends Component {
    // Pagination trait for handling pagination
    use WithPagination;

    // Filter and search properties
    public $search = '';
    public $status = '';
    public $category = '';
    public $priority = '';

    // Fetch studies with applied filters and pagination
    public function with(): array
    {
        $query = Study::where('user_id', auth()->id())
            ->when($this->search, fn($q) => $q->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%'))
            ->when($this->status, fn($q) => $q->where('status', $this->status))
            ->when($this->category, fn($q) => $q->where('category', $this->category))
            ->when($this->priority, fn($q) => $q->where('priority', $this->priority))
            ->orderBy('created_at', 'desc');

        return [
            'studies' => $query->paginate(10),
            'totalStudies' => Study::where('user_id', auth()->id())->count(),
            'completedStudies' => Study::where('user_id', auth()->id())->where('status', 'Completed')->count(),
            'inProgressStudies' => Study::where('user_id', auth()->id())->where('status', 'InProgress')->count(),
        ];
    }

    // Reset pagination when search or filters change
    public function updatingSearch()
    {
        $this->resetPage();
    }

    // Reset pagination when filters change
    public function resetFilters()
    {
        $this->search = '';
        $this->status = '';
        $this->category = '';
        $this->priority = '';
        $this->resetPage();
    }

    public $confirmingDeleteId = null;

    public function confirmDelete($studyId)
    {
        $this->confirmingDeleteId = $studyId;
        $this->dispatch('openDeleteModal', $studyId);
    }

    public function delete($studyId)
    {
        $study = Study::where('user_id', auth()->id())->findOrFail($studyId);
        $study->delete();
        $this->confirmingDeleteId = null;
        session()->flash('message', 'Study deleted successfully!');
    }
};
?>

<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <flux:heading size="xl">Study Tracker</flux:heading>
            <flux:subheading>Manage your learning progress and track study goals</flux:subheading>
        </div>
        <div class="flex gap-3">
            <flux:button :href="route('studies.create')" variant="primary" icon="plus" wire:navigate>
                Add New Study
            </flux:button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid gap-4 md:grid-cols-3">
        <div class="rounded-lg border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-800">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Total Studies</p>
                    <p class="text-2xl font-bold text-zinc-900 dark:text-white">{{ $totalStudies }}</p>
                </div>
                <div class="rounded-full bg-blue-100 p-3 dark:bg-blue-900">
                    <flux:icon name="book-open" class="h-6 w-6 text-blue-600 dark:text-blue-400" />
                </div>
            </div>
        </div>

        <div class="rounded-lg border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-800">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400">In Progress</p>
                    <p class="text-2xl font-bold text-zinc-900 dark:text-white">{{ $inProgressStudies }}</p>
                </div>
                <div class="rounded-full bg-yellow-100 p-3 dark:bg-yellow-900">
                    <flux:icon name="clock" class="h-6 w-6 text-yellow-600 dark:text-yellow-400" />
                </div>
            </div>
        </div>

        <div class="rounded-lg border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-800">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Completed</p>
                    <p class="text-2xl font-bold text-zinc-900 dark:text-white">{{ $completedStudies }}</p>
                </div>
                <div class="rounded-full bg-green-100 p-3 dark:bg-green-900">
                    <flux:icon name="check-circle" class="h-6 w-6 text-green-600 dark:text-green-400" />
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="rounded-lg border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-800">
        <div class="mb-4 flex items-center justify-between">
            <flux:heading size="lg">Filters</flux:heading>
            <flux:button wire:click="resetFilters" variant="ghost" size="sm">
                Reset All
            </flux:button>
        </div>

        <div class="grid gap-4 md:grid-cols-4">
            <!-- Search -->
            <flux:input wire:model.live="search" placeholder="Search studies..." icon="magnifying-glass" />

            <!-- Status Filter -->
            <flux:select wire:model.live="status" placeholder="All Statuses">
                <option value="">All Statuses</option>
                <option value="NotStarted">Not Started</option>
                <option value="InProgress">In Progress</option>
                <option value="Completed">Completed</option>
            </flux:select>

            <!-- Category Filter -->
            <flux:select wire:model.live="category" placeholder="All Categories">
                <option value="">All Categories</option>
                <option value="Web Development">Web Development</option>
                <option value="Database">Database</option>
                <option value="Programming">Programming</option>
                <option value="Framework">Framework</option>
                <option value="Other">Other</option>
            </flux:select>

            <!-- Priority Filter -->
            <flux:select wire:model.live="priority" placeholder="All Priorities">
                <option value="">All Priorities</option>
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
            </flux:select>
        </div>
    </div>

    <!-- Studies Table -->
    <div class="rounded-lg border border-zinc-200 bg-white dark:border-zinc-700 dark:bg-zinc-800">
        <div class="p-6">
            <flux:heading size="lg">Your Studies</flux:heading>
        </div>

        @if($studies->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="border-b border-zinc-200 dark:border-zinc-700">
                    <tr>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-zinc-500 dark:text-zinc-400">
                            Study
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-zinc-500 dark:text-zinc-400">
                            Category
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-zinc-500 dark:text-zinc-400">
                            Status
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-zinc-500 dark:text-zinc-400">
                            Priority
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-zinc-500 dark:text-zinc-400">
                            Start Date
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-zinc-500 dark:text-zinc-400">
                            End Date
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-zinc-500 dark:text-zinc-400">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                    @foreach($studies as $study)
                    <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-700/50">
                        <td class="px-6 py-4">
                            <div>
                                <div class="font-medium text-zinc-900 dark:text-white">
                                    {{ $study->title }}
                                </div>
                                @if($study->description)
                                <div class="text-sm text-zinc-500 dark:text-zinc-400">
                                    {{ Str::limit($study->description, 60) }}
                                </div>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <flux:badge size="sm" color="zinc">{{ $study->category }}</flux:badge>
                        </td>
                        <td class="px-6 py-4">
                            @if($study->status === 'Completed')
                            <flux:badge size="sm" color="green">Completed</flux:badge>
                            @elseif($study->status === 'InProgress')
                            <flux:badge size="sm" color="yellow">In Progress</flux:badge>
                            @else
                            <flux:badge size="sm" color="gray">Not Started</flux:badge>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($study->priority === 'High')
                            <flux:badge size="sm" color="red">High</flux:badge>
                            @elseif($study->priority === 'Medium')
                            <flux:badge size="sm" color="orange">Medium</flux:badge>
                            @else
                            <flux:badge size="sm" color="blue">Low</flux:badge>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-zinc-500 dark:text-zinc-400">
                            {{ $study->start_date?->format('M d, Y') ?? 'Not set' }}
                        </td>
                        <td class="px-6 py-4 text-sm text-zinc-500 dark:text-zinc-400">
                            {{ $study->end_date?->format('M d, Y') ?? 'Not set' }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <flux:button :href="route('studies.show', $study)" size="sm" variant="ghost"
                                    wire:navigate>
                                    View
                                </flux:button>
                                <flux:button :href="route('studies.edit', $study)" size="sm" variant="ghost"
                                    wire:navigate>
                                    Edit
                                </flux:button>
                                <flux:button wire:click="confirmDelete({{ $study->id }})" size="sm" variant="danger">
                                    Delete
                                </flux:button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4">
            {{ $studies->links() }}
        </div>
        @else
        <!-- Empty State -->
        <div class="p-12 text-center">
            <flux:icon name="book-open" class="mx-auto h-12 w-12 text-zinc-400" />
            <flux:heading size="lg" class="mt-4">No studies found</flux:heading>
            <flux:subheading class="mt-2">
                @if($search || $status || $category || $priority)
                No studies match your current filters. Try adjusting your search criteria.
                @else
                Get started by creating your first study to track your learning progress.
                @endif
            </flux:subheading>
            <div class="mt-6">
                @if($search || $status || $category || $priority)
                <flux:button wire:click="resetFilters" variant="outline">
                    Clear Filters
                </flux:button>
                @else
                <flux:button :href="route('studies.create')" variant="primary" wire:navigate>
                    Create Your First Study
                </flux:button>
                @endif
            </div>
        </div>
        @endif
    </div>


    <!-- Flash Messages -->
    @if (session()->has('message'))
    <div class="rounded-md bg-green-50 p-4 dark:bg-green-900/20">
        <div class="flex">
            <flux:icon name="check-circle" class="h-5 w-5 text-green-400" />
            <div class="ml-3">
                <p class="text-sm font-medium text-green-800 dark:text-green-200">
                    {{ session('message') }}
                </p>
            </div>
        </div>
    </div>
    @endif
</div>
