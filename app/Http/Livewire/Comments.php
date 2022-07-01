<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Comment;
use Livewire\withPagination;

class Comments extends Component
{
    use WithPagination;


    public $newComment;
    public $image;

    protected $listeners = [
        'fileUpload' => 'handleFileUpload',
    ];

    public function handleFileUpload($image)
    {
        dd($image);
        
        // $this->image = $file;
    }


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
    }

    public function remove($commentId)
    {
      $comment = Comment::find($commentId);
       
      $comment->delete();
    }
    

    public function render()
    {
        // $this->allcomments = Comment::all();
        return view('livewire.comments',[
            'allcomments' => Comment::latest()->paginate(3),
            'image' => $this->image,
        ]);
    }

}
