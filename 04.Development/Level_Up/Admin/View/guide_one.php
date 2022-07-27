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
    <link rel="stylesheet" href="./resources/css/auth.css">
    <link rel="stylesheet" href="guide_one.css">
</head>

<body>

    <?php require_once('./sidebar.php') ?>

    <section class="container">
        <!-- title of the Guide and View Guide -->
        <div class="text">
            <div class="columns">
                <div class="is-size-3 column  is four-quarters has-text-weight-semibold"> Guide Setting </div>
                <div class="view is-size-5 column  is-2 has-text-weight-bold"><u>View Guide</u> </div>
            </div>
        </div>
        <br /><br />
        <!-- Title of the Add step and Add more -->
        <div>
            <input class="input is-medium    input is-black" type="text" placeholder="Title">
        </div>
        <br/><br/><br/>
        <div class="columns">
            <div class="is-size-3 column  is four-quarters has-text-weight-semibold"> Add Step </div>
            <div class="addview is-size-5 column  is-2 has-text-weight-bold"><u>Add more</u> </div>
        </div>


        <!-- Step 1 -->
        <section class="section">
            <div class="tile is-ancestor">
                <div class="tile is-parent">
                    <article class="tile is-child">
                        <label class="
                            label title is-4 has-text-weight-medium ">Step 1</label>
                        <br /><br />
                        <div>
                            <p class="subtitle is-6 has-text-weight-medium"><span class="icon">
                                    <i class="fas fa-check-square"></i>
                                </span>Username Creation</p>
                                <p class="subtitle is-6 has-text-weight-medium"><span class="icon">
                                    <i class="fas fa-check-square"></i>
                                </span>Click on the button located right side of the website...</p>
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
        <!-- Step 2 -->
        <section class="section">
            <div class="tile is-ancestor">
                <div class="tile is-parent">
                    <article class="tile is-child">
                        <label class="
                            label title is-4 has-text-weight-medium ">Step 2</label>
                        <br /><br />
                        <div>
                            <p class="subtitle is-6 has-text-weight-medium"><span class="icon">
                                    <i class="fas fa-check-square"></i>
                                </span>Username Creation</p>
                                <p class="subtitle is-6 has-text-weight-medium"><span class="icon">
                                    <i class="fas fa-check-square"></i>
                                </span>Click on the button located right side of the website...</p>
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
        <!-- Step 3 -->
        <section class="section">
            <div class="tile is-ancestor">
                <div class="tile is-parent">
                    <article class="tile is-child">
                        <label class="
                            label title is-4 has-text-weight-medium ">Step 3</label>
                        <br /><br />
                        <div>
                            <p class="subtitle is-6 has-text-weight-medium"><span class="icon">
                                    <i class="fas fa-check-square"></i>
                                </span>Username Creation</p>
                                <p class="subtitle is-6 has-text-weight-medium"><span class="icon">
                                    <i class="fas fa-check-square"></i>
                                </span>Click on the button located right side of the website...</p>
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
        <!-- Save button -->
        <button class="button is-black  has-text-weight-semibold">Save</button>
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