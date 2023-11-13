<?php
include './inc/db.php';
include './inc/form.php';
include './inc/select.php';
include './inc/db_close.php';

//echo '<pre>';
//print_r($users);
//echo '</pre>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Luna Bookstore</title>
</head>
<body>

<div class="container"> 

    <div class="position-relative text-center">
      <div class="col-lg-6 col-md-8 mx-auto">
        <img src="./images/logo.png" alt="">
        <h1 class="fw-light">Luna Bookstore</h1>
        <h3 class="lead fw-normal">Opening soon!</h3>
        <h3 id="demo"></h3>   
        <h3 class="lead fw-normal">Enter your Info and get the chance to win:</h3>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">$150 gift card</li>
            <li class="list-group-item">Plus 2 books for free!</li>
        </ul>
      </div>
    </div>

<div class="position-relative text-center">
   <div class="col-md-5 p-lg-5 mx-auto my-5">

    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <h3>Please enter your information</h3>
        <div class="mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" name="firstName" id="firstName" class="form-control"  value="<?php echo $firstName?>" aria-describedby="emailHelp">
            <div class="form-text error"><?php echo $errors['firstNameError'] ?></div>
        </div>

        <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" name="lastName" id="lastName" class="form-control" value="<?php echo $lastName?>" aria-describedby="emailHelp">
            <div class="form-text error"><?php echo $errors['lastNameError'] ?></div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="text" name="email" id="email" class="form-control" value="<?php echo $email?>" aria-describedby="emailHelp">
            <div class="form-text error"><?php echo $errors['emailError'] ?></div>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

<!--load-->
<div class="loader-con">
    <div id="loader">
        <canvas id="circularLoader" width="200" height="200"></canvas>
    </div>
</div>

<!-- Button trigger modal -->
<div class="d-grid gap-2 col-5 mx-auto my-5">
    <button type="button" id="winner" class="btn btn-primary">
            Choose A Winner
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="display-6 text-center modal-title" id="modalLabel">The Winner</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php foreach($users as $user): ?>
      <h5 class="card-title"><?php echo htmlspecialchars($user['firstName']) . ' ' . htmlspecialchars($user['lastName']) ?></h5>
      <?php endforeach ?>
      </div>
    </div>
  </div>
</div>


<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/script.js"></script>
<script src="./js/loader.js"></script>

</body>
</html>