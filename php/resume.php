<?php
//start the session
session_start();

if(!isset($_SESSION["firstName"]))
{
    //redirect to login page
    header('Location: ../index.php');
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Resume</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- External CSS -->
    <link rel="stylesheet" href="../css/resume.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" integrity="sha512-ARJR74swou2y0Q2V9k0GbzQ/5vJ2RBSoCWokg4zkfM29Fb3vZEQyv0iWBMW/yvKgyHSR/7D64pFMmU8nYmbRkg==" crossorigin="anonymous" />
  </head>



  <body class="bg-light">

    <div class="">
      <div class="bg-primar">
        <div class="container">
          <div class="pt-4 pb-4 text-light no-gutters bg-primar row">
            <div class="col">
              <h2>Resume</h2>
            </div>
            <div class="col text-right my-auto">
              <button onclick="location.href = 'logout.php';" type="button" class="btn btn-light">Logout</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Introduction -->
      <div class="myback pt-5">
        <div class="container">
            <div class="shadow row no-gutters mt-4 mb-5">
              <div id = "left" class="col col-md-5 col-12 bg-primar">
                <div class="">
                  <img src=<?php echo "../upload/" . $_SESSION["photo"]; ?>  style="height:100%; width: 100%; object-fit: cover" alt="">
                </div>

              </div>
              <div id = "right" class="col col-md-7 col-12 bg-light">
                <div class="p-5">
                  <h1>I'M <b><?php echo $_SESSION["firstName"] . " " . $_SESSION["lastName"]; ?></b></h1>
                  <p class="mb-4">Software Engineer & Coffee Addict</p>
                  <!-- details -->
                  <div class="details">
                    <div class="row">
                      <div class="col col-4">
                        <p><b>DOB</b></p>
                      </div>
                      <div class="col col-8">
                        <p><?php echo $_SESSION["dob"]; ?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col col-4">
                        <p><b>Address</b></p>
                      </div>
                      <div class="col col-8">
                        <p><?php echo $_SESSION["address"]; ?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col col-4">
                        <p><b>Phone</b></p>
                      </div>
                      <div class="col col-8">
                        <p><?php echo $_SESSION["contact"]; ?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col col-4">
                        <p><b>Email</b></p>
                      </div>
                      <div class="col col-8">
                        <p><?php echo $_SESSION["email"]; ?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col col-4">
                          <p><b>Education</b></p>
                      </div>
                      <div class="col col-8">
                        <p><?php echo $_SESSION["edu"]; ?></p>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="mt-auto text-light pt-4 pb-4 text-center row no-gutters bg-primar">
                  <div class="col">
                    <a href=<?php echo 'https://' . $_SESSION['linkedin']; ?>><i class="text-light fab fa-linkedin-in"></i></a>
                  </div>
                  <div class="col">
                    <a href=<?php echo 'https://' . $_SESSION['github']; ?>><i class="text-light fab fa-github"></i></a>
                  </div>
                  <div class="col">
                    <i class="fab fa-facebook-f"></i>
                  </div>
                  <div class="col">
                    <i class="fab fa-twitter"></i>
                  </div>
                  <div class="col">
                    <i class="fab fa-google-plus-g"></i>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
      <h3 class="text-center text-primar mb-4">Skills</h3>
      <div class="container mb-5">
        <div class=" shadow row no-gutters">
          <div class="p-5 col-md-6">
            <p class="mb-3"><b>About</b></p>
            <p class="mb-5"><?php echo $_SESSION["about"]; ?></p>
            <p class="mb-3"><b>Interests</b></p>
            <?php
                $s =  explode(" " , $_SESSION["interest"]);
                foreach ($s as $value) {
                  if ($value!=""){
                    echo '<span class="mr-2 mb-2 pl-3 pr-3 pt-2 pb-2 text-light rounded bg-primar">' .
                      $value .
                    '</span>';
                  }
                }

            ?>

          </div>
          <div class="p-5 col-md-6">
            <div class="">
              <?php
                  $s =  explode(" " , $_SESSION["skill"]);
                  if (in_array("html", $s))
                  {
                      echo '<p>HTML</p>
                      <div class="progress mb-3" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 35%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>';
                  }

              ?>
            </div>
            <div class="">
              <?php
                  $s =  explode(" " , $_SESSION["skill"]);
                  if (in_array("css", $s))
                  {
                      echo '<p>CSS</p>
                      <div class="progress mb-3" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>';
                  }

              ?>
            </div>
            <div class="">
              <?php
                  $s =  explode(" " , $_SESSION["skill"]);
                  if (in_array("php", $s))
                  {
                      echo '<p>PhP</p>
                      <div class="progress mb-3" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>';
                  }

              ?>
            </div>
            <div class="">
              <?php
                  $s =  explode(" " , $_SESSION["skill"]);
                  if (in_array("git", $s))
                  {
                      echo '<p>GitHub</p>
                      <div class="progress mb-3" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 5%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>';
                  }

              ?>
            </div>
            <div class="">
              <?php
                  $s =  explode(" " , $_SESSION["skill"]);
                  if (in_array("bootstrap", $s))
                  {
                      echo '<p>BootStrap</p>
                      <div class="progress mb-3" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>';
                  }

              ?>
            </div>


          </div>
        </div>

      </div>
    </div>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- Font Awesome  -->
    <script src="https://kit.fontawesome.com/31875a1568.js" crossorigin="anonymous"></script>

    <!-- External JavaScript -->
    <script src="../js/resume.js"></script>

    <!-- BootStrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
  </body>
</html>
