<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Levelup - Appeal List</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="./resources/css/index.css">
  <link rel="stylesheet" href="./resources/css/mystyles.css" />
  <link rel="stylesheet" href="./resources/css/appealList.css">
</head>

<body>
  <?php require_once('./sidebar.php') ?>
  <div class="container mt-2 ml-0 pl-0">
    <div class="column">
      <div class="is-size-5 has-text-weight-bold has-text-black">
        Appeal Review Lists
      </div>
      <table id="tbl_appeals" class="table is-hoverable is-fullwidth mt-6 levelup-table" style="background-color: #fefbf6;">
        <tr>
          <th>Instructor’s Name</th>
          <th>Date</th>
          <th>Reason of Banning</th>
          <th>More Detail</th>
        </tr>
        <tr id="no-data">
          <td colspan="4" class="has-text-centered">
              No data.
          </td>
        </tr>
        <!-- <tr>
          <td>Michael Jordan</td>
          <td>24/06/2022</td>
          <td>Break Copyright Rules</td>
          <td><button class="button is-black is-size-7 has-text-weight-bold">Go To Form</button></td>
        </tr>
        <tr>
          <td>Michael Jordan</td>
          <td>24/06/2022</td>
          <td>Break Copyright Rules</td>
          <td><button class="button is-black is-size-7 has-text-weight-bold">Go To Form</button></td>
        </tr>
        <tr>
          <td>Michael Jordan</td>
          <td>24/06/2022</td>
          <td>Break Copyright Rules</td>
          <td><button class="button is-black is-size-7 has-text-weight-bold">Go To Form</button></td>
        </tr>
        <tr>
          <td>Michael Jordan</td>
          <td>24/06/2022</td>
          <td>Break Copyright Rules</td>
          <td><button class="button is-black is-size-7 has-text-weight-bold">Go To Form</button></td>
        </tr>
        <tr>
          <td>Michael Jordan</td>
          <td>24/06/2022</td>
          <td>Break Copyright Rules</td>
          <td><button class="button is-black is-size-7 has-text-weight-bold">Go To Form</button></td>
        </tr>
        <tr>
          <td>Michael Jordan</td>
          <td>24/06/2022</td>
          <td>Break Copyright Rules</td>
          <td><button class="button is-black is-size-7 has-text-weight-bold">Go To Form</button></td>
        </tr>
        <tr>
          <td>Michael Jordan</td>
          <td>24/06/2022</td>
          <td>Break Copyright Rules</td>
          <td><button class="button is-black is-size-7 has-text-weight-bold">Go To Form</button></td>
        </tr> -->
      </table>

      <hr style="background-color: #413E3E; height: 0.5px;margin-top: 5rem;">

      <div class="is-flex is-justify-content-center mt-6">
        <div class="page mr-10 mb-5" style="width: 17rem;">
          <nav class="pagination is-centered" role="navigation" aria-label="pagination">
            <a class="pagination-previous"> <img style="width: 10px; " src="./resources/img/left_arrow.png"> </a>
            <a class="pagination-next"><img style="width: 10px; " src="./resources/img/right_arrow.png"></a>
            <ul class="pagination-list">
              <li><a class="pagination-link is-current" aria-label="Goto page 1" aria-current="page">1</a></li>
              <li><a class="pagination-link" aria-label="Goto page 2">2</a></li>
              <li><span class="pagination-ellipsis">&hellip;</span></li>
              <li><a class="pagination-link" aria-label="Goto page 45">45</a></li>
            </ul>
          </nav>
        </div>
      </div>

    </div>
  </div>
</body>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./resources/js/moment.js"></script>
<script src="./resources/js/appealList.js"></script>
</html>