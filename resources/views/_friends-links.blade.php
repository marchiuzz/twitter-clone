<h3 class="font-bold text-xl">Follows</h3>

<ul>

   @forelse(current_user()->follows as $user)

    <li class="mb-4">
        <div class="flex items-center text-sm">
            <a href="{{route('profile', $user)}}">

            <img src="{{$user->avatar}}" class="rounded-full mr-2">
            {{$user->name}}

            </a>
        </div>
    </li>
    @empty
       <p>Nieko nera</p>

    @endforelse

</ul>
