<div class="flex justify-center">
    <div class="w-6/12">
        <h1 class="my-10 text-3xl">Comments</h1>
        @error('newComment')<span class="text-red-500">{{ $message }}</span>@enderror

        <section>
            <input type="file" id="image" wire:change="$emit('fileChoosen')">
        </section>
        <form wire:submit.prevent="addComment">
            <div class="my-4 flex">
                <input type="text" class="w-full rounded border shadow p-2 mr-2 my-2" wire:model.debounce.500ms="newComment" placeholder="......">
                <div class="py-2">
                    <button type="submit" class="p-2 bg-blue-500 w-20 rounded shadow text-white">Add</button>
                </div>
            </div>
        </form>
        @foreach ($allcomments as $comment)
            <div class="rounded bordeer shadow p-3 my-2">
                <div class="flex justify-start my-2">
                    <p class="font-bold text-lg">{{$comment['creator']}}</p>
                    <p class="mx-3 py-1  text-xs text-gray-500 font-semibold">{{$comment->created_at}}</p>
                    <i class="fas fa-times" wire:click="remove({{$comment->id}})" style="color: rgb(226, 86, 86)"></i>
                </div>
                <p class="text-gray-800">{{$comment->body}}</p>
            </div>
        @endforeach
        {{$allcomments->links('pagination-links')}}
    </div>
</div>

<script>
    window.livewire.on('fileChoosen', ()=> {
        let inputField = document.getElementById('image');
        let file = inputField.files[0];
        let reader = new FileReader();
        reader.onloadend = () => {
            window.livewire.emit('fileUpload', reader.result);
        };
        reader.readAsDataURL(file);
    });
</script>
