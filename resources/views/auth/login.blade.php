<x-master>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
        <div class="grid grid-cols-1 md:grid-cols-2">

            <div class="p-6">
                <div class="ml-12 justify-center">
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm center">


                        <form method="POST" action="/login">
                            @csrf
                            <input type="text" name="email" placeholder="Email">
                            <input type="password" name="password">
                            <button type="submit">Login</button>
                        </form>


                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    {{dump($errors)}}
</x-master>
