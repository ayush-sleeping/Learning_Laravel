<?php

use App\Models\Study;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.app')] class extends Component {
    public $title = '';
    public $description = '';
    public $status = '';
    public $category = '';
    public $priority = '';
    public $start_date = '';
    public $end_date = '';

    // Validation rules for study creation
    public function rules()
    {
        return [
            'title' => 'required|string|max:100',
            'description' => 'nullable|string|max:500',
            'status' => 'required|in:NotStarted,InProgress,Completed',
            'category' => 'required|string|max:50',
            'priority' => 'required|in:Low,Medium,High',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ];
    }

    // Save new study to the database
    public function save()
    {
        $this->validate();
        Study::create([
            'user_id' => auth()->id(),
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'category' => $this->category,
            'priority' => $this->priority,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);
        session()->flash('message', 'Study created successfully!');
        return redirect()->route('studies.index');
    }
};
?>

<div class="space-y-6">
    {{-- Page Header --}}
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <flux:heading size="xl">Add New Study</flux:heading>
            <flux:subheading>Fill in the details to track a new study topic.</flux:subheading>
        </div>
        <flux:button :href="route('studies.index')" variant="primary" icon="arrow-left" wire:navigate>
            Back To Studies
        </flux:button>
    </div>

    <div class="max-w-2xl mx-auto space-y-8">
        {{-- Form for creating a new study :: --}}
        <form wire:submit.prevent="save" class="space-y-6">
            <div class="grid gap-4 md:grid-cols-2">
                <flux:input label="Title" wire:model.defer="title" required placeholder="Enter study title" />
                <flux:select label="Status" wire:model.defer="status" required placeholder="Select status">
                    <option value="">Select status</option>
                    <option value="NotStarted">Not Started</option>
                    <option value="InProgress">In Progress</option>
                    <option value="Completed">Completed</option>
                </flux:select>
                <flux:select label="Category" wire:model.defer="category" required placeholder="Select category">
                    <option value="">Select category</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Database">Database</option>
                    <option value="Programming">Programming</option>
                    <option value="Framework">Framework</option>
                    <option value="Other">Other</option>
                </flux:select>
                <flux:select label="Priority" wire:model.defer="priority" required placeholder="Select priority">
                    <option value="">Select priority</option>
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                </flux:select>
            </div>
            <flux:textarea label="Description" wire:model.defer="description"
                placeholder="Add a short description (optional)" />
            <div class="grid gap-4 md:grid-cols-2">
                <flux:input label="Start Date" type="date" wire:model.defer="start_date" />
                <flux:input label="End Date" type="date" wire:model.defer="end_date" />
            </div>
            <div class="flex gap-3 justify-end">
                <flux:button :href="route('studies.index')" variant="ghost" type="button" wire:navigate>Cancel
                </flux:button>
                <flux:button type="submit" variant="primary" icon="plus">Create Study</flux:button>
            </div>
        </form>

        {{-- Success Message :: --}}
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
</div>
