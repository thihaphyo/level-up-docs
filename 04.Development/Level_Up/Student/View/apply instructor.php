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
</head>

<body>
    <?php require_once('./header.php') ?>

    <!-- start of main -->
    <main>
        <!-- stat of container -->
        <div class="container">

            <h1 class="title mb-6">Apply Instructor Form</h1>

            <!-- start of input columns -->
            <div class="columns mb-6">

                <!-- start of column -->
                <div class="column is-half">
                    <p class="is-size-5 has-text-weight-semibold mb-5" for="">Name</p>
                    <input class="input is-medium has-text-weight-medium" type="text" placeholder="e.g. john william">
                </div>
                <!-- end of column -->


                <!-- start of column -->
                <div class="column is-half">
                    <p class="is-size-5 has-text-weight-semibold mb-5" for="">Email Address</p>
                    <input class="input is-medium has-text-weight-medium" type="text" placeholder="e.g. name1353@gmail.com">
                </div>
                <!-- end of column -->

            </div>
            <!-- end of input columns -->

            <!-- start of input columns -->
            <div class="columns mb-6">

                <!-- start of column -->
                <div class="column is-half">
                    <p class="is-size-5 has-text-weight-semibold mb-5" for="">Phone Number</p>
                    <input class="input is-medium has-text-weight-medium" type="text" placeholder="e.g. +95 9535339">
                </div>
                <!-- end of column -->


                <!-- start of column -->
                <div class="column is-half">
                    <p class="is-size-5 has-text-weight-semibold mb-5" for="">Address</p>
                    <input class="input is-medium has-text-weight-medium" type="text" placeholder="e.g. At Stein, Block A Lane 31, Build A">
                </div>
                <!-- end of column -->

            </div>
            <!-- end of input columns -->

            <!-- start of input columns -->
            <div class="columns mb-6">

                <!-- start of column -->
                <div class="column is-half">
                    <p class="is-size-5 has-text-weight-semibold mb-5" for="">Graduated Degree</p>
                    <input class="input is-medium has-text-weight-medium" type="text" placeholder="e.g. Bsc(Hons) Network Engineer">
                </div>
                <!-- end of column -->


                <!-- start of column -->
                <div class="column is-half">
                    <p class="is-size-5 has-text-weight-semibold mb-4" for="">Gradudated Year</p>
                    <input class="input is-medium has-text-weight-medium p-4" type="text" placeholder="e.g. 2016">
                </div>
                <!-- end of column -->

            </div>
            <!-- end of input columns -->

            <!-- start of input columns -->
            <div class="columns mb-6">

                <!-- start of column -->
                <div class="column is-half">
                    <p class="is-size-5 has-text-weight-semibold mb-5" for="">Job Position</p>
                    <input class="input is-medium has-text-weight-medium" type="text" placeholder="e.g. Bsc(Hons) Network Engineer">
                </div>
                <!-- end of input column -->


                <!-- start of input column -->
                <div class="column is-half is-flex">

                    <!-- start of input from column -->
                    <div class="column">
                        <p class="is-size-5 has-text-weight-semibold mb-4" for="">From</p>
                        <div class="select is-medium">
                            <select class="has-text-weight-medium">
                                <option>Select Year (From)</option>
                                <option>With</option>
                            </select>
                        </div>
                    </div>
                    <!-- end of input from column -->


                    <!-- start of input to column -->
                    <div class="column">
                        <p class="is-size-5 has-text-weight-semibold mb-4" for="">To</p>
                        <div class="select is-medium">
                            <select class="has-text-weight-medium">
                                <option>Select Year (To)</option>
                                <option>With options</option>
                            </select>
                        </div>
                    </div>
                    <!-- end of input to column -->
                </div>
            </div>
            <!-- end of input columns -->

            <!-- start of add more button columns -->
            <div class="columns mb-6 has-text-right">
                <div class="column is-full">
                    <a class="is-size-5 has-text-weight-semibold mb-4 is-underlined" for="">Add More</a>
                </div>
            </div>
            <!-- end of add more button columns -->

            <!-- start of reason input columns -->
            <div class="columns mb-6">
                <div class="column is-full">
                    <p class="is-size-5 has-text-weight-semibold mb-5" for="">Reason To Become Instructor</p>
                    <div class="columns">
                        <div class="column is-5">
                            <p class="text-size-6 is-italic has-text-weight-medium has-text-grey-dark">
                                Words count is limited. You should write it between 100 to 150 characters.
                                Above 150 characters, you will no longer to write.
                            </p>
                        </div>
                    </div>

                    <textarea class="textarea is-medium has-text-weight-medium is-size-6" placeholder="Medium textarea" rows="10"></textarea>
                </div>

            </div>
            <!-- end of reason input columns -->

            <!-- start of button columns -->
            <div class="has-text-right">
                <button class="button is-primary js-modal-trigger has-text-weight-semibold" data-target="quiz-modal">
                    Quiz
                </button>
                <a class="button is-primary is-outlined has-text-weight-semibold" href="./index.php">Cancel</a>
                <a class="button is-primary has-text-weight-semibold" href="./apply instructor success.php">Apply Now</a>

            </div>
            <!-- end of button columns -->

        </div>
        <!-- end of container -->

        <!-- start of quiz modal -->
        <div class="modal" id="quiz-modal">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="title has-text-primary">Quiz</p>
                </header>
                <section class="modal-card-body">
                    <div class="mb-3">
                        <label class="has-text-weight-medium">Question 1 of 2</label>
                        <h3 class="is-size-5 has-text-weight-medium">Q. What is the purpose of using css ?</h3>
                        <div class="control is-flex is-flex-direction-column">
                            <label class="radio p-4">
                                <input type="radio" name="answer" value="a">
                                A. provides the web browser with security information
                            </label>
                            <label class="radio p-4">
                                <input type="radio" name="answer" value="b">
                                B. provides the web browser with security information
                            </label>
                            <label class="radio p-4">
                                <input type="radio" name="answer" value="c">
                                C. provides the web browser with security information
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="has-text-weight-medium">Question 2 of 2</label>
                        <h3 class="is-size-5 has-text-weight-medium">Q. What is the purpose of using css ?</h3>
                        <div class="control is-flex is-flex-direction-column">
                            <label class="radio p-4">
                                <input type="radio" name="answer" value="a">
                                A. provides the web browser with security information
                            </label>
                            <label class="radio p-4">
                                <input type="radio" name="answer" value="b">
                                B. provides the web browser with security information
                            </label>
                            <label class="radio p-4">
                                <input type="radio" name="answer" value="c">
                                C. provides the web browser with security information
                            </label>
                        </div>
                    </div>

                </section>
                <footer class="modal-card-foot">
                    <button class="button is-primary is-outlined has-text-weight-semibold">Cancel</button>
                    <button class="button is-primary has-text-weight-semibold">Check Now</button>
                </footer>
            </div>
        </div>
        <!-- End of quiz modal -->

    </main>
    <!-- end of main -->


    <?php require_once('./footer.php') ?>
    <!-- javascript file -->
    <script src="./resources/js/quiz modal.js"></script>

</body>

</html>