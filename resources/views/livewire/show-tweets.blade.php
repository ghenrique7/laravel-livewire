<div>
    Show Tweets

    {{ $content  }}

    <form method="post" wire:submit.prevent="create">
        @csrf
        <input
                type="text"
                name="content"
                id="content"
                wire:model="content"
        >
        @error('content') {{$message}} @enderror
        <button
                type="submit">Criar Tweet
        </button>

    </form>
    <hr>
    @foreach($tweets as $tweet)
        {{ $tweet->user->name  }} - {{ $tweet->content  }}
        @if($tweet->likes->count())
            <a href="#" wire:click.prevent="unlike({{$tweet->id}})">Descurtir</a>
        @else
            <a href="#" wire:click.prevent="like({{$tweet->id}})">Curtir</a>
        @endif
        <br>
    @endforeach
    <hr>
    <div>
        {{ $tweets->links() }}
    </div>
</div>
