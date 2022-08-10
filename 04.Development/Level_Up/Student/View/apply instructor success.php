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
    <link rel="stylesheet" href="./resources/css/mystyles.css?<?php echo $time ?>">
    <link rel="stylesheet" href="./resources/css/root.css?<?php echo $time ?> ">
    <link rel="stylesheet" href="./resources/css/apply instructor.css?<?php echo $time ?> ">

</head>

<body>
    <?php require_once('./header.php'); ?>

    <!-- start of main -->
    <main>
        <!-- start of apply instructor success section -->
        <section>
            <!-- start of container -->
            <div class="container">

                <!-- start of columns  -->
                <div class="columns is-flex-direction-column has-text-centered apply-success">

                    <!-- start of column -->
                    <div class="column is-full">
                        <h1 class="mb-6 has-text-weight-bold">We've recieved the form successfully</h1>
                    </div>
                    <!-- end of column -->

                    <!-- start of column -->
                    <div class="column is-full mb-6 apply-success-img">
                        <img width="26%" src="./resources/img/header_footer/handshake.svg" alt="handshake"></img>
                    </div>
                    <!-- end of column -->

                    <!-- start of column -->
                    <div class="column is-5 m-auto has-text-weight-semibold mb-6 apply-success-message">
                        <p class="is-4">We will reply to your employement pass
                            immediately after we review your application.
                            If you pass, we will contact you and if not, we apologize that you have to try again.
                        </p>
                    </div>
                    <!-- end of column -->

                    <!-- start of column -->
                    <div class="column is-full mt-4 apply-success-thanks">
                        <h1 class="has-text-weight-bold">Thank you for choosing with us to work</h1>
                    </div>
                    <!-- end of column -->

                </div>
                <!-- end of columns -->
            </div>
            <!-- end of container -->

        </section>
        <!-- end of apply instructor success section -->

    </main>
    <!-- end of main -->


    <?php require_once('./footer.php'); ?>
</body>

</html>