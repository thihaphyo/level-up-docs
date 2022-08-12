<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Level Up</title>
    <link rel="stylesheet" href="./resources/css/mystyles.css">
    <link rel="stylesheet" href="./resources/css/root.css">
    <link rel="stylesheet" href="contact.css">
</head>

<body>
    <?php require_once('./header.php') ?>

    <main>
        <!-- start of container  -->
        <div class="container">
            <section>
                <h1 class="is-size-2 has-text-weight-bold">Any Qusetion?
                    <sub class="is-size-5 has-text-weight-semibold">
                        We'd love to hear from you
                    </sub>
                </h1>
                <br /><br />
            </section>

            <div class="columns">
                <div class="column">
                    <div class="tile is-ancestor">
                        <div class="tile is-vertical is-8">
                            <div class="tile is-parent">
                                <?php
                                require "../Model/contactDBtable.php";
                                ?>
                                <?php
                                // Upload image
                                foreach ($result as $key => $value) {
                                    echo "<img style='width: 80%;' src='../../Admin/storage/" . $value['profile_image'] . "'>";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="column">
                            <form autocomplete="off" class="form" role="form" method="post" action="../Controller/sendmailcontroller.php">
                                <div class="tile is-parent is-vertical">
                                    <article>
                                        <br /> <br />
                                        <p class="title is-size-3 has-text-weight-bold">Contact Form</p>
                                        <br />
                                        <div class="control">
                                            <label class="label is-size-6 has-text-weight-semibold">Uername</label>
                                            <input class="input is-white " name="full_name" class="form-control" type="text" placeholder=" eg.John123">
                                        </div>
                                        <br /> <br />
                                        <div class="control">
                                            <label class="label is-size-6 has-text-weight-semibold">Contact Number</label>
                                            <input class="input is-white " name="mobile_number" class="form-control" type="text" placeholder="eg.0914857574">
                                        </div>
                                        <br /> <br />
                                        <div class="control">
                                            <label class="label is-size-6 has-text-weight-semibold">Email Address</label>
                                            <input class="input is-white " name="email" type="text" class="form-control" placeholder="eg.John123@gmail.com">
                                        </div>
                                        <br /> <br />
                                        <div class="control">
                                            <label class="label is-size-6 has-text-weight-semibold">Your Qusetion</label>
                                            <textarea class="textarea is-white" name="messenge" class="form-control" placeholder="e.g.Lorem ipsum, dolor sit amet  consectetur adipisicing elit. consectetur adipisicing elit. Repudiandae, eos. Esse"></textarea>
                                        </div>
                                        <br /><br />
                                        <div class="buttons">
                                            <button class="button is-primary"><b>Send</b></button>
                                        </div>
                                    </article>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                    // Phone-number and Email
                        echo "<article>";
                        echo "<div style=' 
                                
                                    position: relative;
                                    width: 49rem;
                                    top: 1rem; left:2rem' class='contact columns'>";
                        echo "<img src='contact image/el_phone-alt (1).png' alt='phone'>";
                        echo " <div class='column is-size-5 has-text-weight-medium'>";
                        echo "  Call Us:<br /><sub class='is-size-5 has-text-weight-medium'>" . $result[0]['phone_number'] . "</sub>";
                        echo "</div>";
                        echo "<img src='contact image/Vector (3).png' alt='email'>";
                        echo "<div class='column is-size-5 has-text-weight-medium'>";
                        echo "Send Us: <br /><sub class='is-size-5 has-text-weight-medium'>" . $result[0]['email'] . "</sub>";
                        echo "</div>";
                        echo "</div>";
                        echo "</article>";
                    ?>
                </div>
                <!-- end of container -->
    </main>
    <?php require_once('./footer.php') ?>
    <!-- javascript file -->
    <script src="./resources/js/index.js"></script>
</body>

</html>