<div class="flex p-4 border-b border-b-gray-400">
    <div class="mr-4 flex-shrink-0">
        <img src="{{$tweet->user->avatar}}" class="avatar rounded-full mr-2">
    </div>

    <div>
        <h5 class="font-bold mb-4">
            <a href="{{ $tweet->user->path() }}">{{$tweet->user->name}}</a>
        </h5>

        <p class="text-sm">
            {{$tweet->body}}
        </p>


        <div class="flex">
            <div class="p-2 text-blue-500">
                <form action="" method="POST">
                    <button type="submit">Like </button>
                </form>
                (100)
            </div>
            <div class="p-2 text-red-500">
                <form action="" method="POST">
                    <button type="submit">Dislike</button>
                </form>
                (150)
            </div>

        </div>
    </div>
</div>
