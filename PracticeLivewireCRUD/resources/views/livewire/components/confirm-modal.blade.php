<?php
use Livewire\Volt\Component;

new class extends Component {
    // Modal properties
    public $show = false;
    public $title = '';
    public $message = '';
    public $confirmButton = 'Delete';
    public $cancelButton = 'Cancel';
    public $onConfirm;
    public $onCancel;
    public $payload;

    // Open the confirmation modal with parameters
    public function open($title, $message, $onConfirm, $payload = null, $confirmButton = 'Delete', $cancelButton = 'Cancel', $onCancel = null)
    {
        $this->show = true;
        $this->title = $title;
        $this->message = $message;
        $this->onConfirm = $onConfirm;
        $this->payload = $payload;
        $this->confirmButton = $confirmButton;
        $this->cancelButton = $cancelButton;
        $this->onCancel = $onCancel;
    }

    // Confirm action and emit event
    public function confirm()
    {
        $this->show = false;
        if ($this->onConfirm) {
            $this->emit($this->onConfirm, $this->payload);
        }
    }

    // Cancel action and emit event if provided
    public function cancel()
    {
        $this->show = false;
        if ($this->onCancel) {
            $this->emit($this->onCancel, $this->payload);
        }
    }
};
?>

@if($show)
// Modal Overlay
<div class="fixed inset-0 z-50 flex items-center justify-center bg-black/40">
    <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-lg w-full max-w-md p-6">
        <div class="mb-4">
            <flux:heading size="lg">{{ $title }}</flux:heading>
            <p class="mt-2 text-zinc-600 dark:text-zinc-300">{{ $message }}</p>
        </div>
        <div class="flex justify-end gap-3 mt-6">
            <flux:button wire:click="cancel" variant="ghost">{{ $cancelButton }}</flux:button>
            <flux:button wire:click="confirm" variant="danger">{{ $confirmButton }}</flux:button>
        </div>
    </div>
</div>
@endif
