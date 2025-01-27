<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.app')] class extends Component {
    public string $phone = '';
    public string $address = '';
    public string $created_at = '';

    public function mount()
    {
        $user = Auth::user();
        $this->phone = $user->phone ?? '';
        $this->address = $user->address ?? '';
        $this->created_at = $user->created_at ? $user->created_at->format('Y-m-d H:i:s') : now()->format('Y-m-d H:i:s');
    }

    public function updateContactInfo()
    {
        $validated = $this->validate([
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:255'],
            'created_at' => ['required', 'date_format:Y-m-d H:i:s'], // Validar formato de fecha y hora
        ]);

        // Actualizar los datos del usuario autenticado
        $user = Auth::user();
        $user->update($validated);

        // Disparar el evento para el mensaje de éxito
        $this->dispatch('contact-info-updated');
    }
};
?>

<div>
    <form wire:submit="updateContactInfo">
        <!-- Phone -->
        <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input wire:model="phone" id="phone" class="block mt-1 w-full" type="text" name="phone"
                autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />
            <textarea wire:model="address" id="address" class="block mt-1 w-full" name="address"></textarea>
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Created At -->
        <div class="mt-4">
            <x-input-label for="created_at" :value="__('Created At')" />
            <x-text-input wire:model="created_at" id="created_at" class="block mt-1 w-full" type="text" name="created_at"
                autocomplete="created_at" />
            <x-input-error :messages="$errors->get('created_at')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4 mt-4">
            <x-primary-button>
                {{ __('Save') }}
            </x-primary-button>

            <x-action-message class="text-green-500" on="contact-info-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</div>
