<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Alert extends Component
{
    public $message;
    public $type;
    public $isVisible = false;

    protected $listeners = ['showAlert'];

    public function showAlert($message, $type = 'success')
    {
        $this->message = $message;
        $this->type = $type;
        $this->isVisible = true;
    }

    public function hideAlert()
    {
        $this->isVisible = false;
    }
    public function render()
    {
        return view('livewire.alert');
    }
}
