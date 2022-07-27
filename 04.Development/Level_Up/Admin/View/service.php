    <?php
    $time = time();
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Level Up</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="stylesheet" href="./resources/css/index.css?<?php echo $time ?>">
        <link rel="stylesheet" href="./resources/css/mystyles.css">
        <link rel="stylesheet" href="./resources/css/root.css">
        <link rel="stylesheet" href="service.css">
    </head>

    <body>

        <?php require_once('./sidebar.php') ?>

        <section class="container">
            <!-- title of the contact -->
            <div class="text">
                <h3 class="title is-3 has-text-weight-semibold">Service Setting</h2>
            </div>
            <br /><br />
            <!-- box of the title and Description -->
            <div>
                <input class="input is-normal    input is-black" type="text" placeholder="Title">
                <br /><br />
                <textarea class="textarea is-black" placeholder="Description "></textarea>
            </div>
            <br />
            <!-- select image -->
            <div class="file is-boxed">
                <label class="file-label">
                    <input class="file-input" type="file" name="resume">
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                            Choose a file…
                        </span>
                    </span>
                </label>
            </div>
            <!-- button -->
            <button class="button is-black  has-text-weight-semibold">Change</button>
            <!-- Title 1 -->
            <section class="section">
                <div class="tile is-ancestor">
                    <div class="tile is-parent">
                        <article class="tile is-child">
                            <label class="
                            label title is-4 has-text-weight-medium ">Title 1</label>
                            <br /><br />
                            <div>
                                <p class="subtitle is-6 has-text-weight-medium"><span class="icon">
                                        <i class="fas fa-check-square"></i>
                                    </span>Description</p>
                                <p class="subtitle  is-6 has-text-weight-medium"><span class="icon">
                                        <i class="fas fa-check-square"></i>
                                    </span>image name.jpge</p>
                                <div class="columns">
                                    <div class="column is-1 has-text-weight-bold"> <u>Edit</u> </div>
                                    <div class="column is-1 has-text-weight-bold"><u>Delete</u> </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </section>
            <!-- Title 2 -->
            <section class="section">
                <div class="tile is-ancestor">
                    <div class="tile is-parent">
                        <article class="tile is-child">
                            <label class="
                            label title is-4 has-text-weight-medium ">Title 2</label>
                            <br /><br />
                            <div>
                                <p class="subtitle is-6 has-text-weight-medium"><span class="icon">
                                        <i class="fas fa-check-square"></i>
                                    </span>Description</p>
                                <p class="subtitle  is-6 has-text-weight-medium"><span class="icon">
                                        <i class="fas fa-check-square"></i>
                                    </span>image name.jpge</p>
                                <div class="columns">
                                    <div class="column is-1 has-text-weight-bold"> <u>Edit</u> </div>
                                    <div class="column is-1 has-text-weight-bold"><u>Delete</u> </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </section>
            <!-- Title 3 -->
            <section class="section">
                <div class="tile is-ancestor">
                    <div class="tile is-parent">
                        <article class="tile is-child">
                            <label class="
                            label title is-4 has-text-weight-medium ">Title 3</label>
                            <br /><br />
                            <div>
                                <p class="subtitle is-6 has-text-weight-medium"><span class="icon">
                                        <i class="fas fa-check-square"></i>
                                    </span>Description</p>
                                <p class="subtitle  is-6 has-text-weight-medium"><span class="icon">
                                        <i class="fas fa-check-square"></i>
                                    </span>image name.jpge</p>
                                <div class="columns">
                                    <div class="column is-1 has-text-weight-bold"> <u>Edit</u> </div>
                                    <div class="column is-1 has-text-weight-bold"><u>Delete</u> </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </section>
            <!-- Title 4 -->
            <section class="section">
                <div class="tile is-ancestor">
                    <div class="tile is-parent">
                        <article class="tile is-child">
                            <label class="
                            label title is-4 has-text-weight-medium ">Title 4</label>
                            <br /><br />
                            <div>
                                <p class="subtitle is-6 has-text-weight-medium"><span class="icon">
                                        <i class="fas fa-check-square"></i>
                                    </span>Description</p>
                                <p class="subtitle  is-6 has-text-weight-medium"><span class="icon">
                                        <i class="fas fa-check-square"></i>
                                    </span>image name.jpge</p>
                                <div class="columns">
                                    <div class="column is-1 has-text-weight-bold"> <u>Edit</u> </div>
                                    <div class="column is-1 has-text-weight-bold"><u>Delete</u> </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </section>
        </section>
        <script>
            const body = document.querySelector('body'),
                sidebar = body.querySelector('nav'),
                toggle = body.querySelector(".toggle"),
                searchBtn = body.querySelector(".search-box"),
                modeSwitch = body.querySelector(".toggle-switch"),
                modeText = body.querySelector(".mode-text");
            toggle.addEventListener("click", () => {
                sidebar.classList.toggle("close");
            })
        </script>
    </body>

    </html>