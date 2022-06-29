<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Comment;
class Comments extends Component
{
    public $allcomments;
    

    public $newComment;

    

    // public function mount($comments)
    // {
    //     $this->allcomments = $comments;
    // }

    public function addComment()
    {
        $this->validate(['newComment' => 'required|min:3|max:255']);

        if($this->newComment == ''){
            return;
        }
        Comment::create([
            'body'=> $this->newComment,
        ]);
        $this->newComment = '';

        // session()->flash('message', 'Comment added successfully');

        // if($this->newComment == '')
        //  return;
        // array_unshift($this->comments,[
        //     'body' =>$this->newComment,
        //     'created_at' => '1 min ago',
        //     'creator' => 'Abror'
        // ]);
    }

    public function remove($commentId)
    {
      $comment = Comment::find($commentId);
       
      $comment->delete();
    }
    

    public function render()
    {
        $this->allcomments = Comment::all();
        return view('livewire.comments');
    }

}
