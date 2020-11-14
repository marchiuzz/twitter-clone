<x-app>

    <div class="flex justify-between relative">
        <header>
            <img class="rounded-2xl mb-6" src="https://i.ytimg.com/vi/h8NrKjJPAuw/maxresdefault.jpg">
        </header>

        <img src="{{$profile->avatar}}" class="rounded-full mr-2 absolute"
             style="width: 90px;left: calc(50% - 56px);top: 76%;">
    </div>

    <div class="flex justify-between relative">
        <div>
            <h2 class="font-bold text-lg-center">
                {{$profile->name}}
            </h2>
            <p>Joined {{$profile->created_at->diffForHumans()}}</p>
        </div>

        <div>

            @can('update', $profile)
            <a href="{{ $profile->path('edit') }}" class="rounded-lg shadow py-4 px-2 text-black">Edit Profile</a>
            @endcan

            <x-follow-form :profile="$profile"></x-follow-form>

        </div>
    </div>

    @include('_timeline', ['tweets' => $profile->tweets])


</x-app>
