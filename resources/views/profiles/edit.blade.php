<x-app>
    <style>
        form input {
            color: white;
            background-color: grey;
            border: black 1px solid;
        }
    </style>
    <form method="POST" action="{{ $profile->path() }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <input type="text" name="name" value="{{$profile->name}}">
        <input type="text" name="username" value="{{$profile->username}}">
        <input type="text" name="email" value="{{$profile->email}}">

        <input type="file" name="avatar">

        <input type="password" name="password">
        <input type="password" name="password_confirmation">

        <button type="submit">Atnaujinti</button>
    </form>

    {{dump($errors)}}
</x-app>
