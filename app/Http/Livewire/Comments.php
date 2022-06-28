<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
class Comments extends Component
{
    public $comments = [
        [
            'body' =>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                     Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, 
                     when an unknown printer took a galley of type and scrambled it to make a type specimen book',
            'created_at' => '3 min ago',
            'creator' => 'Ahror'
        ]
    ];

    public $newComment;

    public function mount()
    {
        $this->newComment = 'I am from function';
    }

    public function addComment()
    {
        if($this->newComment == '')
         return;
        array_unshift($this->comments,[
            'body' =>$this->newComment,
            'created_at' => '1 min ago',
            'creator' => 'Abror'
        ]);

        $this->newComment = '';
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
