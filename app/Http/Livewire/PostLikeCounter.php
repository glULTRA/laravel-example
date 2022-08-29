<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Http\Request;
use Livewire\Component;

class PostLikeCounter extends Component
{
    public Post $post;
    public $isLiked;
    public int $likes;
    public function render()
    {
        // Render section and passing variables.
        return view('livewire.post-like-counter',  [
            'post' => $this->post,
            'likes' => $this->likes,    
            'isLiked' => $this->isLiked,
        ]);
    }

    public function mount(Post $post)
    {
        // On loading page should load from database.
        $this->post = $post;
        $this->likes = $post->likes->count();  
        $this->isLiked = $post->likedBy(auth()->user());
    }

    public function like(Request $request)
    {
        // Backend storing in the database.
        if($this->post->likedBy($request->user())){
            return response(null, 409);
        }
        $this->post->likes()->create([
            'user_id' => $request->user()->id,
        ]);

        // Front end visual looks.
        $this->likes = $this->post->likes()->count();
        $this->isLiked = true;

    }
    

    public function dislike(Request $request){
        // Backend storing in the database.
        $request->user()->likes()->where('post_id', $this->post->id)->delete();

        // Front end visual looks.
        $this->isLiked = false;
        $this->likes = $this->post->likes()->count();
    }
}
