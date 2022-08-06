<?php

namespace App\Http\Livewire\Author;

use Livewire\Component;
use App\Models\User;

class TopHeader extends Component
{
    public $author;

    protected $listeners = [
        'refreshPageTopHeader' => '$refresh'
    ];

    public function mount(){
        $this->author = User::find(auth('web')->id());
    }
    public function render()
    {
        return view('livewire.author.top-header');
    }
}
