<!DOCTYPE html>
<html lang="en">

<head>
    <script src = "https://cdn.tailwindcss.com"></script>

    <title>Music</title>
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
                               class="rounded-md px-3 py-2 text-sm font-medium"
                               aria-current="page">Home</a>

                            <!--                                /** adding music form*/-->
                            <?php if (isset($_SESSION['admin'])) :?>
                                <form action="/add_music" method="post" enctype="multipart/form-data">
                                    <button type="submit"
                                            class=" hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Add Music</button>
                                </form>

                                <!--  /** adding artist form*/-->
                                <form action="/add_artist" method="post" enctype="multipart/form-data">
                                    <button type="submit"
                                            class=" hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Add artist</button>
                                </form>
                                <form action="/check_request" method="post" enctype="multipart/form-data">
                                    <button type="submit"
                                            class=" hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Request list</button>
                                </form>
                            <?php endif; ?>
                            <?php if (isset($_SESSION['user'])) :?>
                            <form action="/add_playlist" method="post">
                                <button type="submit"
                                        class=" hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Create Playlist</button>
                                <form action="/show_playlist" method="post">
                                    <button type="submit"
                                            class="hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">show Playlist</button>

                                    <?php endif;?>

                                </form>
                                <?php if(isset($_SESSION['id'])) :?>
                                    <form action="/request_premium" method="post">
                                        <input type="hidden" name="request_user_id" value="<?php echo ($_SESSION['id'])?>">
                                        <button type="submit"
                                                class="hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Request Premium</button>
                                    </form>
                                <?php endif;?>
                        </div>
                    </div>
                </div>


                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">


                        <!-- Log in -->
                        <?php if (isset($_SESSION['admin'])) :?>
                            <form action="/logout" method="post" enctype="multipart/form-data">
                                <button type="submit"
                                        class="bg-blue-500 hover:bg-blue-700 text-whitefont-bold py-2 px-4 rounded">
                                    Log out</button>
                            </form>
                        <?php elseif(isset($_SESSION['user'])):?>
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
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Add Music
                </h1>

            </div>
        </header>
        <form action="/add_music" method="post" enctype="multipart/form-data">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-8 ml-20" >
                    <div class="mt-3 grid grid-cols-1 gap-x-5 gap-y-5 sm:grid-cols-4">
                        <div class="sm:col-span-4">
                            <label for="musicName" class="block text-sm font-medium leading-6 text-gray-900">Music
                                Name</label>
                            <div class="mt-2">
                                <div
                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <input type="text" name="musicName" id="musicName" autocomplete="username"
                                           class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                           placeholder="  song Name">
                                </div>
                            </div>
                        </div>
                        <div class="sm:col-span-4">
                            <label for="artistName" class="block text-sm font-medium leading-6 text-gray-900">Artist Name</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <select name="artist" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" id="cars">
                                        <option value="">select</option>

                                        <?php foreach ($artistname as $artist): ?>
                                            <option value="<?php echo$artist->id?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><?php echo$artist->artist_name?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-span">
                            <label for="song-photo" class="block text-sm font-medium leading-6 text-gray-900">song
                                photo</label>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
                            <input type="file" name ="music" class="block w-full text-sm text-gray-900 border border-white-300 rounded-lg cursor-pointer bg-white-50 dark:text-white-400 focus:outline-none dark:bg-white-700 dark:border-white-600 dark:placeholder-white-400" multiple>
                        </div>
                    </div>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-whitefont-bold py-2 px-4 rounded ml-20">add Music</button>
            </div>
        </form>
    </main>
</div>


</body>

</html>
