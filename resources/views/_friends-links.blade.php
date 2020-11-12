<h3 class="font-bold text-xl">Follows</h3>

<ul>

   @foreach(auth()->user()->follows as $user)

    <li class="mb-4">
        <div class="flex items-center text-sm">
            <a href="{{route('profile', $user)}}">

            <img src="{{$user->avatar}}" class="rounded-full mr-2">
            {{$user->name}}

            </a>
        </div>
    </li>
    @endforeach

</ul>
