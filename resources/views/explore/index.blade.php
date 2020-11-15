<x-app>

    @forelse($profiles as $profile)
        <a href="{{$profile->path()}}">{{$profile->name}}</a><br />
    @empty
    nieko nera

    @endforelse

</x-app>
