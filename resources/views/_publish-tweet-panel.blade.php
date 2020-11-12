<div class="border border-blue-400 rounded-lg p-8">
    <form action="/tweets" method="POST">
        @csrf
        <textarea name="body" class="w-full" placeholder="whats up">
                    </textarea>
        <hr class="my-4">

        <footer class="flex justify-between">
            <img src="{{ Auth::user()->avatar }}" class="rounded-full mr-2">
            <button type="submit" class="bg-blue-500 rounded-lg shadow px-4 px-2 text-white">Tweet</button>
        </footer>

    </form>

    @error('body')
    <p class="text-red-500 text-sm mt-2">{{$message}}</p>
    @enderror

</div>
