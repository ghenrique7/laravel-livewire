<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTweets extends Component
{
    use WithPagination;

    public $content = 'Apenas um teste 2';

    protected $rules = [
        'content' => 'required|min:3|max:255'
    ];

    public $numberOfPaginatorsRendered = [true];

    public function render()
    {
        $tweets = Tweet::with('user')->latest()->paginate(10);

        return view('livewire.show-tweets', compact('tweets'));
    }

    public function create()
    {
        $this->validate();
//        Tweet::create([
//            'content' => $this->content,
//            'user_id' => 1
//        ]);
        auth()->user()->tweets()->create([
            'content' => $this->content,
        ]);

        $this->content = '';
    }

    public function like($idTweet)
    {
        $tweet = Tweet::find($idTweet);

        $tweet->likes()->create([
            'user_id' => auth()->user()->id
        ]);
    }

    public function unlike($idTweet)
    {
        $tweet = Tweet::find($idTweet);

        $tweet->likes()->delete();
    }
}
