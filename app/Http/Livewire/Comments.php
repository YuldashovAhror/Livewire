<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Comments extends Component
{
    public $comments = [
        [
            'body' =>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                     Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, 
                     when an unknown printer took a galley of type and scrambled it to make a type specimen book',

            'created_ad' => '3 min ago',
            
            'creator' => 'Ahror'
        ]
    ];

    public function render()
    {
        return view('livewire.comments');
    }
}
