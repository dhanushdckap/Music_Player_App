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
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Home
                </h1>

            </div>
        </header>
        <div class="ml-20 mt-5">
            <?php if (isset($_SESSION['admin'])) :?>
                <p>Welcome  back <?php echo $_SESSION['admin']?> !!!</p>
            <?php endif; ?>
        </div>
        <div class="inline-flex rounded-md shadow-sm ml-20 mt-10" role="group">
            <form action="/music_list" method="post">
                <button class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white"
                        aria-current="page">All Music</button>
            </form>
            <form action="/artist_list" method="post" >
                <button class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white"
                        aria-current="page">All Artist</button>
            </form>
            </form>
        </div>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <!-- Your content -->

            <br>
            <div style="display: flex">
                <?php foreach ($album as $album_name) :?>
                    <form action="/album_description" method="post">
                        <button name="projectId" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800" type ="submit" value="<?php $album_name['id']->id?>"><?php echo $album_name['album_name']?></button>
                    </form>
                <?php endforeach;?>
            </div>
            <div style="display: flex">
                <?php foreach ($artist as $artistname): ?>
                    <form action="/artist_description" method="post">
                        <button name="projectId" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800" type ="submit" value="<?php echo $artistname->id?>"><?php echo $artistname->artist_name?></button>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
</div>


</body>

</html>