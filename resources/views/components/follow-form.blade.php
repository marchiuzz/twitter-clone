@if(current_user()->isNot($profile))
<form method="POST" action="{{route('profile.follow', $profile)}}">
    @csrf
    <button type="submit" class="bg-blue-500 rounded-lg shadow py-4 px-2 text-white">
        {{ current_user()->following($profile) ? "Unfollow Me" : "Follow Me" }}
    </button>
</form>
@endif
