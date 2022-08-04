<?php
$time = time();
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Level Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="./resources/css/mystyles.css?<?php echo $time ?>">
    <link rel="stylesheet" href="./resources/css/root.css?<?php echo $time ?> ">
    <link rel="stylesheet" href="./resources/css/apply instructor.css?<?php echo $time ?> ">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>

<body>
    <?php
    require_once('./header.php');
    session_start();
    $_SESSION['lid'] = 1;
    ?>

    <!-- start of main -->
    <main>
        <!-- stat of container -->
        <div class="container">

            <h1 class="title mb-6">Apply Instructor Form</h1>
            <form action="../Controller/applyInstructorController.php" method="post" id="applyForm">
                <!-- start of input columns -->
                <div class="columns mb-6">

                    <!-- start of column -->
                    <div class="column is-half">
                        <p class="is-size-5 has-text-weight-semibold mb-5" for="">Name</p>
                        <input class="input is-medium has-text-weight-medium" type="text" placeholder="e.g. john william" name="fullname" required>
                    </div>
                    <!-- end of column -->


                    <!-- start of column -->
                    <div class="column is-half">
                        <p class="is-size-5 has-text-weight-semibold mb-5" for="">Email Address</p>
                        <input class="input is-medium has-text-weight-medium" type="text" placeholder="e.g. name1353@gmail.com" name="email" required>
                        <p class="warning is-italic pt-1 has-text-danger is-hidden">* Please enter the email correctly. *</p>
                    </div>
                    <!-- end of column -->

                </div>
                <!-- end of input columns -->

                <!-- start of input columns -->
                <div class="columns mb-6">

                    <!-- start of column -->
                    <div class="column is-half">
                        <div class="columns is-full">
                            <div class="column">
                                <p class="is-size-5 has-text-weight-semibold mb-5" for="">Phone Number</p>
                                <div class="columns">
                                    <div class="column is-narrow">
                                        <div class="select is-medium">
                                            <select name="countryCode">
                                                <option value="+1">+1 US</option>
                                                <option value="+95">+95 MM</option>
                                                <option value="+66">+66 THA</option>
                                                <option value="+65">+65 SG</option>
                                                <option value="+81">+81 JP</option>
                                                <option value="+84">+84 VN</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="column">
                                        <input class="input is-medium has-text-weight-medium" type="number" placeholder="e.g. 953533944" name="phone" required>
                                        <p class="warning is-italic pt-1 has-text-danger is-hidden">* Phone number should be at least 9. *</p>
                                    </div>

                                </div>
                            </div>



                        </div>

                    </div>
                    <!-- end of column -->


                    <!-- start of column -->
                    <div class="column is-half">
                        <p class="is-size-5 has-text-weight-semibold mb-5" for="">Address</p>
                        <input class="input is-medium has-text-weight-medium" type="text" placeholder="e.g. At Stein, Block A Lane 31, Build A" name="address" required>
                    </div>
                    <!-- end of column -->

                </div>
                <!-- end of input columns -->

                <!-- start of input columns -->
                <div class="columns mb-6">

                    <!-- start of column -->
                    <div class="column is-half">
                        <p class="is-size-5 has-text-weight-semibold mb-5" for="">Graduated Degree</p>
                        <input class="input is-medium has-text-weight-medium" type="text" placeholder="e.g. Bsc(Hons) Network Engineer" name="degree" required>
                    </div>
                    <!-- end of column -->


                    <!-- start of column -->
                    <div class="column is-half">
                        <p class="is-size-5 has-text-weight-semibold mb-4" for="">Gradudated Year</p>
                        <input class="input is-medium has-text-weight-medium p-4 years" type="number" placeholder="e.g. 2016" name="gyear" required>
                        <p class="warning is-italic pt-1 has-text-danger is-hidden">* Please enter the year correctly *</p>
                    </div>
                    <!-- end of column -->

                </div>
                <!-- end of input columns -->


                <!-- start of input columns -->
                <div class="columns mb-6">

                    <!-- start of column -->
                    <div class="column is-half">
                        <p class="is-size-5 has-text-weight-semibold mb-5" for="">Job Position</p>
                        <input class="input is-medium has-text-weight-medium" type="text" placeholder="e.g. Web Developer" name="position" required>
                    </div>
                    <!-- end of input column -->


                    <!-- start of input column -->
                    <div class="column is-half is-flex">

                        <!-- start of input from column -->
                        <div class="column">
                            <p class="is-size-5 has-text-weight-semibold mb-4">From</p>
                            <input class="input is-medium has-text-weight-medium years" type="number" placeholder="e.g. 2016" name="from" required>
                            <p class="warning is-italic pt-1 has-text-danger is-hidden">* Please enter the year correctly *</p>
                        </div>
                        <!-- end of input from column -->


                        <!-- start of input to column -->
                        <div class="column">
                            <p class="is-size-5 has-text-weight-semibold mb-4">To</p>
                            <input class="input is-medium has-text-weight-medium years" type="number" placeholder="e.g. 2018" name="to" required>
                            <p class="warning is-italic pt-1 has-text-danger is-hidden">* Please enter the year correctly *</p>

                        </div>
                        <!-- end of input to column -->
                    </div>
                </div>
                <!-- end of input columns -->

                <!-- start of add more input -->
                <div id="addMoreContent">
                </div>
                <!-- end of add more input -->

                <!-- start of add more button columns -->
                <div class="columns mb-6 has-text-right">
                    <div class="column is-full">
                        <a class="is-size-5 has-text-weight-semibold mb-4 is-underlined" id="addMore">Add More</a>
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
                                    Words count is limited. You should write it between 250 to 300 characters.
                                    Above 300 characters, you will no longer to write.
                                </p>
                            </div>
                        </div>

                        <textarea class="textarea is-medium has-text-weight-medium is-size-6" placeholder="My Reason" rows="10" name="reason" maxlength="300" required></textarea>
                    </div>

                </div>
                <!-- end of reason input columns -->

                <!-- start of button columns -->
                <div class="has-text-right">

                    <button class="button is-primary js-modal-trigger has-text-weight-semibold" data-target="quiz-modal">
                        Quiz
                    </button>
                    <a class="button is-primary is-outlined has-text-weight-semibold" href="./index.php">Cancel</a>
                    <button type="submit" class="button is-primary has-text-weight-semibold" id="applyNow">Apply Now</button>
                    <p class="warning is-italic pt-1 has-text-danger is-hidden" id="finalWarning">* Some data does not match with the format. *</p>

                </div>
                <!-- end of button columns -->
            </form>

        </div>
        <!-- end of container -->

        <!-- start of if statement -->
        <?php
        // start of isset session
        if (isset($_SESSION['message'])) { ?>
            <!-- start of fail message notification section -->
            <div class="notification is-danger is-light slide-in-bottom">
                <p class="is-size-6 has-text-weight-medium">
                    <i class="fa-regular fa-circle-xmark"></i>
                    <?php echo $_SESSION['message']['description'] ?>
                </p>
            </div>
            <!-- end of fail message notification section -->
        <?php
            unset($_SESSION['message']);
        } ?>
        <!-- end of if condition -->


        <!-- start of quiz modal -->
        <div class="modal" id="quiz-modal">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="title has-text-primary">Quiz</p>
                </header>
                <section class="modal-card-body" id="quizContent">
                </section>
                <h1 class="is-size-5 has-text-success has-background-white has-text-weight-semibold is-hidden has-text-right pr-5" id="finalResult">Result: 2 of 2 </h1>
                <p class="is-italic has-text-centered has-text-weight-medium has-background-white is-hidden" id="msgToUser">* Please answer also the rest of the questions. *</p>
                <footer class="modal-card-foot">

                    <button class="button is-primary is-outlined has-text-weight-semibold cancel-quiz">Cancel</button>
                    <button class="button is-primary has-text-weight-semibold" id="checkQuizNow">Check Now</button>

                </footer>

            </div>
        </div>
        <!-- End of quiz modal -->

    </main>
    <!-- end of main -->


    <?php require_once('./footer.php') ?>
    <!-- javascript file -->
    <script defer src="./resources/js/apply instructor.js?<?php echo $time; ?>"></script>
    <script src="./resources/js/quiz modal.js?<?php echo $time; ?>"></script>

</body>

</html>