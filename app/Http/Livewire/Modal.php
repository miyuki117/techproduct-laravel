<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Calendar;

class Modal extends Component
{
    public $liveModal = true;
    public $showModal = false;

    // layout メソッドでレイアウトを指定
    public function layout()
    {
        return view('layouts.app'); // layouts フォルダ内の app.blade.php を指定
    }    
  
    public function render()
    {
        return view('livewire.modal');
    }

    public function openModal()
    {
        $this->showModal = true;
    }
 
    public function closeModal()
    {
        $this->showModal = false;
    }

}
