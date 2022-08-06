<?php

namespace App\Http\Livewire\Author;

use Livewire\Component;
use App\Models\User;

class PersonalDetails extends Component
{
    public $author;
    public $name, $email, $user_name, $user_biography;

    public function mount(){
        $this->author = User::find(auth('web')->id());
        $this->name = $this->author->name;
        $this->email = $this->author->email;
        $this->user_name = $this->author->user_name;
        $this->user_biography = $this->author->user_biography;
    }

    public function UpdateDetails(){
        $this->validate([
            'name' => 'required|string',
            'user_name' => 'required|unique:users,user_name,'.auth('web')->id()
        ]);

        User::where('id', auth('web')->id())->update([
            'name' => $this->name,
            'user_name' => $this->user_name,
            'user_biography' => $this->user_biography
        ]);

        $this->emit('refreshPageTopHeader');
        $this->emit('refreshProfileTopHeader');
        $this->showToastr('Your profile has been successfully updated.', 'success');
    }

    public function showToastr($message, $type){
        return $this->dispatchBrowserEvent('showToastr',[
            'type' => $type,
            'message' => $message
        ]);
    }

    public function render()
    {
        return view('livewire.author.personal-details');
    }
}
