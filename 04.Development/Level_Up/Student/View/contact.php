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
    <script src="https://smtpjs.com/v3/smtp.js" defer></script>
    <script src="send.js" defer></script>
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
                                <article>
                                    <figure>
                                        <img src="contact image/undraw_content_team_re_6rlg (1) 2.png">
                                    </figure>
                                    <div class="contact columns">
                                        <img src="contact image/el_phone-alt (1).png" alt="phone">
                                        <div class="column is-size-5 has-text-weight-medium">
                                            Call Us:<br /><sub class="is-size-5 has-text-weight-medium">+95 1452844</sub>
                                        </div>
                                        <img src="contact image/Vector (3).png" alt="email">
                                        <div class="column is-size-5 has-text-weight-medium">
                                            Send Us: <br /><sub class="is-size-5 has-text-weight-medium">John123@gmail.com</sub>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <div class="column">
                            <form onsubmit="sendEmail(); reset(); return false" action="save.php" method="post">
                               
                                    <div class="tile is-parent is-vertical">
                                        <article>
                                            <br /> <br />
                                            <p class="title is-size-3 has-text-weight-bold">Contact Form</p>
                                            <br />
                                            <div class="control">
                                                <label class="label is-size-6 has-text-weight-semibold">Uername</label>
                                                <input class="input is-white " name="username" class="form-control" type="text" placeholder=" eg.John123 ">
                                            </div>
                                            <br /> <br />
                                            <div class="control">
                                                <label class="label is-size-6 has-text-weight-semibold">Contact Number</label>
                                                <input class="input is-white " name="contact-no" class="form-control" type="text" placeholder="eg.0914857574">
                                            </div>
                                            <br /> <br />
                                            <div class="control">
                                                <label class="label is-size-6 has-text-weight-semibold">Email Address</label>
                                                <input id="email" class="input is-white " name="email" class="form-control" type="text" placeholder="eg.John123@gmail.com">
                                            </div>
                                            <br /> <br />
                                            <div class="control">
                                                <label class="label is-size-6 has-text-weight-semibold">Your Qusetion</label>
                                                <textarea class="textarea is-white" name="question" class="form-control" placeholder="e.g.Lorem ipsum, dolor sit amet  consectetur adipisicing elit. consectetur adipisicing elit. Repudiandae, eos. Esse"></textarea>
                                            </div>
                                            <br /><br />
                                            <div class="buttons">
                                                <button type="submit" onclick="sendEmail()"  class="button is-primary has-text-weight-bold form-control submit"> Send</button>
                                            </div>
                                        </article>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
                <!-- end of container -->
    </main>
    <?php require_once('./footer.php') ?>
    <!-- javascript file -->
    <script src="./resources/js/index.js"></script>
</body>

</html>