<?php

namespace App\Http\Livewire\Author;

use Livewire\Component;
use App\Models\User;

class AuthorProfileHeader extends Component
{
    public $author;

    protected $listeners = [
        'refreshProfileTopHeader' => '$refresh'
    ];

    public function mount(){
        $this->author = User::find(auth('web')->id());
    }

    public function render()
    {
        return view('livewire.author.author-profile-header');
    }
}
