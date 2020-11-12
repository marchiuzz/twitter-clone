@extends('layouts.app')

@section('body')
    <div class="lg:flex">
        <div class="lg:w-1/6">
            @include('_sidebar-links')
        </div>
        <div class="lg:flex-1 lg:mx-10" style="max-width: 700px">
            @include('_publish-tweet-panel')

            <div class="border border-gray-300 rounded-lg">
                @foreach($tweets as $tweet)
                    @include('_tweet')
                @endforeach
            </div>

        </div>
        <div class="lg:w-1/6">
            @include('_friends-links')
        </div>

    </div>
    Dashboard
@endsection
