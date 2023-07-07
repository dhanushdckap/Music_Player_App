<!DOCTYPE html>
<html lang="en">

<head>
    <title>AddArtist</title>
    <script src = "https://cdn.tailwindcss.com"></script>
</head>

<body>
<div class="min-h-full">
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                             alt="Your Company">
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <!--                                homepage form-->
                            <a href="/"
                               class=" rounded-md px-3 py-2 text-sm font-medium"
                               aria-current="page">HomePage</a>

                            <!--                                /** adding music form*/-->
                            <form action="/add_music" method="post" enctype="multipart/form-data">
                                <button type="submit"
                                        class="hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Add Music</button>
                            </form>

                            <!--  /** adding artist form*/-->
                            <form action="/add_artist" method="post" enctype="multipart/form-data">
                                <button type="submit"
                                        class=" hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Add artist</button>
                            </form>
                            <a href="/contact"
                               class=" hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Contact
                                Us</a>

                        </div>
                    </div>
                </div>


                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">


                        <!-- Log in -->
                        <?php if (isset($_SESSION['name'])) :?>
                            <form action="/logout" method="post" enctype="multipart/form-data">
                                <button type="submit"
                                        class="bg-blue-500 hover:bg-blue-700 text-whitefont-bold py-2 px-4 rounded">
                                    Log out</button>
                            </form>

                        <?php else : ?>

                            <div class="relative ml-3">
                                <div>
                                    <form action="/login" method="post" enctype="multipart/form-data">
                                        <button type="submit"
                                                class="bg-blue-500 hover:bg-blue-700 text-whitefont-bold py-2 px-4 rounded">
                                            Log in</button>
                                    </form>

                                </div>

                            </div>
                        <?php endif; ?>

                    </div>

                </div>

            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
    </nav>
    <main>
        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                </h1>

            </div>
        </header>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

            <?php if (isset($_SESSION['name'])) :?>
                <form action="/add_artist" method="post" enctype="multipart/form-data">
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-8">
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Add artist</h2>
                            <div class="mt-3 grid grid-cols-1 gap-x-5 gap-y-5 sm:grid-cols-4">

                                <div class="sm:col-span-4">
                                    <label for="artistName" class="block text-sm font-medium leading-6 text-gray-900">Artist
                                        Name</label>
                                    <div class="mt-2">
                                        <div
                                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                            <input type="text" name="artistName" id="artistName" autocomplete="username"
                                                   class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-span">
                                    <label for="song-photo" class="block text-sm font-medium leading-6 text-gray-900">artist photo
                                        photo</label>
                                    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                        <div class="text-center">
                                            <div class="mt-1 flex text-sm leading-6 text-gray-600">
                                                <label for="file-upload"
                                                       class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                    <span>Upload a file</span>
                                                    <input type="file" id="file-upload" name ="artist[]"  multiple ="multiple">
                                                </label>
                                            </div>
                                            <p class="text-xs leading-5 text-gray-600">only JPG</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-whitefont-bold py-2 px-4 rounded">
                            add Artist</button>



                    </div>


                </form>

            <?php else : ?>
                <section class="bg-gray dark:bg-white-900">
                    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                        <div class="mx-auto max-w-screen-sm text-center">
                            <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-primary-600 dark:text-primary-500">Sorry</h1>
                            <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-gray">only admin's can use this page</p>
                            <a href="/" class="inline-flex text-gray bg-primary-600 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900 my-4">Back to Homepage</a>
                        </div>
                    </div>
                </section>


            <?php endif; ?>

        </div>
    </main>
</div>



</body>

</html>