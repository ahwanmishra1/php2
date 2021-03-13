<?php
//start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- External CSS -->
    <link rel="stylesheet" href="css/master.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" integrity="sha512-ARJR74swou2y0Q2V9k0GbzQ/5vJ2RBSoCWokg4zkfM29Fb3vZEQyv0iWBMW/yvKgyHSR/7D64pFMmU8nYmbRkg==" crossorigin="anonymous" />
  </head>

  <body class="">





    <?php

      // define variables and set to empty values
      $firstNameErr = $lastNameErr = $aboutErr = $contactErr = $emailErr = $dobErr = $skillErr = $eduErr = $interestErr = $linkedinErr = $githubErr = $genderErr = $addressErr = $countryErr = $stateErr = $zipErr = $photoErr = "";
      $firstName = $lastName = $about = $contact = $email = $dob = $skill = $edu = $interest = $linkedin = $github = $gender = $address = $country = $state = $zip = $photo = "";
      $error = 'false';
      $skills = $interests = "";

      if(isset($_POST["submit"]))
      {



        if (empty($_POST["firstName"])) {
          $firstNameErr = "Required";
          $error = 'true';
        } else {
          $firstName = test_input($_POST["firstName"]);
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
            $firstNameErr = "Only letters and white space allowed";
            $error = 'true';
          }
          if(strlen($firstName) <= 3){
            $firstNameErr = "More than three characters required.";
            $error = 'true';
          }
        }

        if (empty($_POST["lastName"])) {
          $lastNameErr = "Required";
          $error = 'true';
        } else {
          $lastName = test_input($_POST["lastName"]);
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z-' ]*$/",$lastName)) {
            $lastNameErr = "Only letters and white space allowed";
            $error = 'true';
          }
          if(strlen($lastName) <= 3){
            $lastNameErr = "More than three characters required.";
            $error = 'true';
          }
        }


        if (empty($_POST["about"]))
        {
          $aboutErr = "Required";
          $error = 'true';
        }
        else {
          $about = test_input($_POST["about"]);
          if(strlen($about) <= 10){
            $aboutErr = "More than ten characters required.";
            $error = 'true';
          }
        }
        if (empty($_POST["address"])) {
          $addressErr = "Required";
          $error = 'true';
        } else {
          $address = test_input($_POST["address"]);
          if(strlen($address) <= 3){
            $addressErr = "More than three characters required.";
            $error = 'true';
          }
        }
        if (empty($_POST["email"])) {
          $emailErr = "Required";
          $error = 'true';
        } else {
          $email = test_input($_POST["email"]);
          // check if e-mail address is well-formed
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $error = 'true';
          }
        }

        if (empty($_POST["linkedin"])) {
          $linkedinErr = "Required";
          $error = 'true';
        } else {
          $linkedin = test_input($_POST["linkedin"]);
          // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
          if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$linkedin)) {
            $linkedinErr = "Invalid URL";
            $error = 'true';
          }
        }

        if (empty($_POST["github"])) {
          $githubErr = "Required";
          $error = 'true';
        } else {
          $github = test_input($_POST["github"]);
          // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
          if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$github)) {
            $githubErr = "Invalid URL";
            $error = 'true';
          }
        }


        if (empty($_POST["gender"])) {
          $genderErr = "Required";
          $error = 'true';
        } else {
          $gender = test_input($_POST["gender"]);
        }


        if (empty($_POST["zip"])) {
          $zipErr = "Required";
          $error = 'true';
        }
        else
        {
          $zip = test_input($_POST["zip"]);
          if (!(preg_match("/^[0-9]*$/",$zip) && ( strlen($zip) == 6)))
          {
            $zipErr = "Zip is invalid";
            $error = 'true';
          }
        }

        if (empty($_POST["contact"])) {
          $contactErr = "Required";
          $error = 'true';
        }
        else
        {
          $contact = test_input($_POST["contact"]);
          if (!(preg_match("/^[0-9]*$/",$contact) && ( strlen($contact) == 10)))
          {
            $contactErr = "Contact is invalid";
            $error = 'true';
          }
        }

        $edu = test_input($_POST["edu"]);

        if (empty($_POST["edu"])) {
          $eduErr = "Required";
          $error = 'true';
        }
        else
        {
          $edu = test_input($_POST["edu"]);
        }


        if (empty($_POST["dob"])) {
          $dobErr = "Required";
          $error = 'true';
        }
        else
        {
          $dob = test_input($_POST["dob"]);
        }

        if (empty($_POST["state"])) {
          $stateErr = "Required";
          $error = 'true';
        }
        else
        {
          $state = test_input($_POST["state"]);
        }

        if (empty($_POST["country"])) {
          $countryErr = "Required";
          $error = 'true';
        }
        else
        {
          $country = test_input($_POST["country"]);
        }

        if(empty($_POST["interest"]))
        {
          $interestErr = "Required";
          $error = 'true';
        }

        if(!empty($_POST['interest'])) {

          $interests = $xx = $_POST['interest'];
          $no_checked = count($_POST['interest']);
          if($no_checked<2)
          {
            $interestErr = "Select at least two options";
            $error = 'true';
          }
          else{
            for($i=0; $i < $no_checked; $i++)
            {
              $interest = $interest . " " . $xx[$i];
            }
          }
        }


        if(empty($_POST["skill"]))
        {
          $skillErr = "You must select a skill";
          $error = 'true';
        }

        if(!empty($_POST['skill'])) {
          $skills = $xx = $_POST['skill'];
          $no_checked = count($_POST['skill']);
          if($no_checked<2)
          {
            $skillErr = "Select at least two options";
            $error = 'true';
          }
          else{
            for($i=0; $i < $no_checked; $i++)
            {
              $skill = $skill . " " . $xx[$i];
            }
          }
        }

        if(!empty($_FILES["photo"]["name"]))
        {
            if($_FILES["photo"]["error"] == 0)
            {
                $allowed_types = array("image/jpeg", "image/jpg", "image/png", "image/gif");

                if((in_array($_FILES["photo"]["type"], $allowed_types)))
                {
                    $dot_pos = strrpos($_FILES["photo"]["name"], ".");
                    $extension = substr($_FILES["photo"]["name"], $dot_pos);
                    $random_name = date("YmdHis");
                    $new_name = $random_name . $extension;
                    if($_FILES["photo"]["size"] < 819200)
                    {
                        $photo = $new_name;
                    }
                    else
                    {
                      $error = 'true';
                      $photoErr = "File should be less than 10KB " . $_FILES["photo"]["size"];
                    }
                }
                else
                {
                    $error = 'true';
                    $photoErr = "Please upload JPG or PNG files";
                }
            }
            else
            {
                $error = 'true';
                $photoErr = "There are some errors with the file";
            }
        }
        else
        {
            $error = 'true';
            $photoErr = "Please browse a file to upload";
        }

      }



      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      ?>





    <!-- Header -->
    <div class="header">
      <div class="bg-light">
          <div class="row h-100">
            <div class="sidebar col col-lg-6">
              <div class="pt-5 pl-5 pr-5 row">
                <div id='aaa' class="col-lg-8 text-light ">
                  <h1>Resume</h1>
                  <p>Help us help you build your own resume website using HTML, CSS, BootStrap, JavaScript and PHP.</p>
                  <button type="button" class="mt-3 btn btn-lg btn-light">Get Started</button>

                </div>

              </div>
              <div class="row">
                  <div class="col text-right">
                    <img src="https://pngimg.com/uploads/robot/robot_PNG57.png"  style="  width: 100%; " class="mt-5" >
                  </div>
              </div>

            </div>
          </div>

        <!-- <div class="sidebar p-5 col col-lg-4">

        </div> -->
        <div class="container-fluid">
          <div class="row">
            <div class="bg-primary col col-lg-4 sig col-12"></div>
            <div class="sig col col-lg-2 col-12 "></div>
            <div class="sig col col-lg-4 col-12">
              <div class="signin">
                <h2 class="">Signup up to Profile</h2>
                <p class="mb-5">Already have an account? <a href="">Sign In</a></p>

                <!-- Signup Form -->
                <form method="post" enctype="multipart/form-data">
                  <h4 class="mb-3">Personal Details</h4>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="firstName">First name</label>
                      <input type="text" class="form-control" id="firstName" placeholder="" value="<?php echo ($firstNameErr=="") && isset($_POST["firstName"]) ? $_POST["firstName"] : ''; ?>" name="firstName" >
                      <div class="error"> <?php echo $firstNameErr;?></div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="lastName">Last name</label>
                      <input type="text" class="form-control" id="lastName" placeholder="" value="<?php echo ($lastNameErr=="") && isset($_POST["lastName"]) ? $_POST["lastName"] : ''; ?>"  name="lastName" >
                      <div class="error"> <?php echo $lastNameErr;?></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="about">About</label>
                    <textarea class="form-control" id="about" rows="3" placeholder="Tell us something about yourself." name="about" ><?php echo ($aboutErr=="") && isset($_POST["about"]) ? $_POST["about"] : ''; ?></textarea>
                    <div class="error"> <?php echo $aboutErr;?></div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" value="<?php echo ($emailErr=="") && isset($_POST["email"]) ? $_POST["email"] : ''; ?>" placeholder="abc@xyz.com" name="email" >
                      <div class="error"> <?php echo $emailErr;?></div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="contact">Contact</label>
                      <input type="text" class="form-control" id="contact" placeholder="9876543210" value="<?php echo ($contactErr=="") && isset($_POST["contact"]) ? $_POST["contact"] : ''; ?>"  name="contact" >
                      <div class="error"> <?php echo $contactErr;?></div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="dob">Date of birth</label>
                      <div id="dob" class="input-group date" data-date-format="mm-dd-yyyy"  >
                          <input class="form-control" type="text" name="dob" value="<?php echo ($dobErr=="") && isset($_POST["dob"]) ? $_POST["dob"] : ''; ?>" />
                          <span class="input-group-addon"></i></span>
                      </div>
                      <div class="error"> <?php echo $dobErr;?></div>
                    </div>
                  </div>

                  <hr class="mb-4">
                  <h4 class="mb-3">Skills</h4>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" value="html" id="html" name="skill[]" <?php echo (in_array("html",$skills)) ? checked : ''; ?>>
                        <label class="custom-control-label" for="html">HTML</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" value="css" id="css" name="skill[]" <?php echo (in_array("css",$skills)) ? checked : ''; ?> >
                        <label class="custom-control-label" for="css">CSS</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" value="bootstrap" id="bootstrap" name="skill[]" <?php echo (in_array("bootstrap",$skills)) ? checked : ''; ?> >
                        <label class="custom-control-label" for="bootstrap">BootStrap</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" value="php" id="php" name="skill[]" <?php echo (in_array("php",$skills)) ? checked : ''; ?> >
                        <label class="custom-control-label" for="php">Php</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" value="git" id="git" name="skill[]" <?php echo (in_array("git",$skills)) ? checked : ''; ?> >
                        <label class="custom-control-label" for="git">GitHub</label>
                      </div>
                    </div>
                  </div>
                  <div class="error"> <?php echo $skillErr;?></div>



                  <hr class="mb-4">


                  <h4 class="mb-3">Qualification</h4>
                  <div class="mb-3">
                    <label for="edu">Educational Qualification</label>
                    <select name="edu" class="custom-select d-block w-100" id="edu" >
                      <option  value="">Choose...</option>
                      <option  value="btech" <?php echo ($_POST["edu"] == "btech") ? selected : ''; ?>>B.Tech</option>
                      <option  value="mtech" <?php echo ($_POST["edu"] == "mtech") ? selected : ''; ?>>M.Tech</option>
                      <option  value="bca" <?php echo ($_POST["edu"] == "bca") ? selected : ''; ?>>BCA</option>
                      <option  value="mca" <?php echo ($_POST["edu"] == "mca") ? selected : ''; ?>>MCA</option>
                    </select>
                    <div class="error"> <?php echo $eduErr;?></div>
                  </div>


                  <div class="mb-3">
                    <label for="interests">Interests</label>
                    <select  multiple="multiple" name="interest[]" class="form-select d-block w-100"  id="interests">
                      <option value="Dancing" <?php echo (in_array("Dancing",$interests)) ? selected : ''; ?> >Dancing</option>
                      <option value="Singing" <?php echo (in_array("Singing",$interests)) ? selected : ''; ?> >Singing</option>
                      <option value="Playing" <?php echo (in_array("Playing",$interests)) ? selected : ''; ?> >Playing</option>
                      <option value="Cooking" <?php echo (in_array("Cooking",$interests)) ? selected : ''; ?> >Cooking</option>
                    </select>
                    <div class="error"> <?php echo $interestErr;?></div>
                  </div>


                  <div class="mb-3">
                    <div class="row">
                      <div class="col-md-6">
                        <label for="LinkedIn">LinkedIn Profile</label>
                        <input type="text" class="form-control" id="LinkedIn" placeholder="www.LinkedIn.com/abc" name="linkedin" value="<?php echo ($linkedinErr=="") && isset($_POST["linkedin"]) ? $_POST["linkedin"] : ''; ?>">
                        <div class="error"> <?php echo $linkedinErr;?></div>
                      </div>

                      <div class="col-md-6">
                        <label for="GitHub">GitHub Profile</label>
                        <input type="text" class="form-control" id="GitHub" placeholder="www.GitHub.com/abc" name="github" value="<?php echo ($agithubErr=="") && isset($_POST["github"]) ? $_POST["github"] : ''; ?>">
                        <div class="error"> <?php echo $githubErr;?></div>
                      </div>



                    </div>

                  </div>



                  <hr class="mb-4">

                  <h4 class="mb-3">Gender</h4>

                  <div class="d-block mb-3">
                    <div class="custom-control custom-radio">
                      <input id="male" value="Male" name="gender" type="radio" class="custom-control-input" name="gender" <?php echo ($_POST["gender"] == "Male") ? checked : ''; ?> >
                      <label class="custom-control-label" for="male">Male</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input id="female" value="Female" name="gender" type="radio" class="custom-control-input" name="gender" <?php echo ($_POST["gender"] == "Female") ? checked : ''; ?>>
                      <label class="custom-control-label" for="female">female</label>
                    </div>
                  </div>
                  <div class="error"> <?php echo $genderErr;?></div>

                  <hr class="mb-4">


                  <h4 class="mb-3">Address</h4>

                  <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="address" value="<?php echo ($addressErr=="") && isset($_POST["address"]) ? $_POST["address"] : ''; ?>" >
                    <div class="error"> <?php echo $addressErr;?></div>

                  </div>


                  <div class="row">
                    <div class="col-md-5 mb-3">
                      <label for="country">Country</label>
                      <select name="country" class="custom-select d-block w-100" id="country" >
                        <option value="">Choose...</option>
                        <option value="India" <?php echo ($_POST["country"] == "India") ? selected : ''; ?> >India</option>
                      </select>
                      <div class="error"> <?php echo $countryErr;?></div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="state">State</label>
                      <select name="state" class="custom-select d-block w-100" id="state" >
                        <option  value="">Choose...</option>
                        <option  value="Odisha" <?php echo ($_POST["state"] == "Odisha") ? selected : ''; ?> >Odisha</option>
                      </select>
                      <div class="error"> <?php echo $stateErr;?></div>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="zip">Zip</label>
                      <input name="zip" type="text" class="form-control" id="zip" placeholder="" value="<?php echo ($zipErr=="") && isset($_POST["zip"]) ? $_POST["zip"] : ''; ?>">
                      <div class="error"> <?php echo $zipErr;?></div>
                    </div>
                  </div>

                  <hr class="mb-4">



                  <h4 class="mb-3">Profile Photo</h4>

                    <div class="form-group">
                      <input type="file" name="photo" />
                      <!-- <label for="exampleFormControlFile1">Profile Photo</label> -->
                      <!-- <input name="photo" type="file" class="form-control-file" id="exampleFormControlFile1"> -->
                      <!-- <input type="submit" name="photo" value="Upload" /> -->
                      <div class="error"> <?php echo $photoErr;?></div>
                    </div>

                  <hr class="mb-4">

                  <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="Process">Check Input</button>



                </form>
                <!-- output -->

              </div>
              <div class="output_section mb-5">
                <?php
                  echo "<h2 class='mb-5'>Your Input:</h2>";
                  echo "<span class='output_text'>First Name: </span>";
                  echo $firstName;
                  echo "<br>";
                  echo "<span class='output_text'>Last Name: </span>";
                  echo $lastName;
                  echo "<br>";
                  echo "<span class='output_text'>About: </span>";
                  echo $about;
                  echo "<br>";
                  echo "<span class='output_text'>Email: </span>";
                  echo $email;
                  echo "<br>";
                  echo "<span class='output_text'>Contact: </span>";
                  echo $contact;
                  echo "<br>";
                  echo "<span class='output_text'>Date of Birth: </span>";
                  echo $dob;
                  echo "<br>";
                  echo "<span class='output_text'>Skills: </span>";
                  echo $skill;
                  echo "<br>";
                  echo "<span class='output_text'>Educational Qualification: </span>";
                  echo $edu;
                  echo "<br>";
                  echo "<span class='output_text'>Interests: </span>";
                  echo $interest;
                  echo "<br>";
                  echo "<span class='output_text'>LinkedIn: </span>";
                  echo $linkedin;
                  echo "<br>";
                  echo "<span class='output_text'>GitHub: </span>";
                  echo $github;
                  echo "<br>";

                  echo "<span class='output_text'>Gender: </span>";
                  echo $gender;
                  echo "<br>";
                  echo "<span class='output_text'>Address: </span>";
                  echo $address;
                  echo "<br>";
                  echo "<span class='output_text'>Country: </span>";
                  echo $country;
                  echo "<br>";

                  echo "<span class='output_text'>State: </span>";
                  echo $state;
                  echo "<br>";
                  echo "<span class='output_text'>Zip: </span>";
                  echo $zip;
                  echo "<br>";
                  echo "<span class='output_text'>Photo: </span>";
                  echo $photo;
                  echo "<br>";
                  echo "<span class='output_text'>Error: </span>";
                  echo $error;

                  if($error == 'false' )
                  {
                      //create session variable as user has valid details
                      $uploaded = move_uploaded_file($_FILES["photo"]["tmp_name"],
                                                 "upload/" . $new_name);
                      if($uploaded)
                      {
                        $photo = $new_name;
                      }
                      else
                      {
                        $error = 'true';
                        $photoErr = "File could not be uploaded";
                      }

                      $_SESSION["firstName"] = $firstName;
                      $_SESSION["lastName"] = $lastName;
                      $_SESSION["about"] = $about;
                      $_SESSION["contact"] = $contact;
                      $_SESSION["email"] = $email;
                      $_SESSION["dob"] = $dob;
                      $_SESSION["skill"] = $skill;
                      $_SESSION["edu"] = $edu;
                      $_SESSION["interest"] = $interest;
                      $_SESSION["linkedin"] = $linkedin;
                      $_SESSION["github"] = $github;
                      $_SESSION["gender"] = $gender;
                      $_SESSION["address"] = $address;
                      $_SESSION["country"] = $country;
                      $_SESSION["state"] = $state;
                      $_SESSION["zip"] = $zip;
                      $_SESSION["photo"] = $photo;
                  }
                ?>
                <hr class="mb-4">

                <button onclick="location.href = 'php/resume.php';" class="btn btn-primary btn-lg btn-block" type="proceed" name="proceed" value="Next" <?php if ($error == 'true' or empty($firstName)){ ?> disabled <?php   } ?> >Build Resume</button>

              </div>
            </div>
            <div class="sig col col-lg-2 col-12"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- Font Awesome  -->
    <script src="https://kit.fontawesome.com/31875a1568.js" crossorigin="anonymous"></script>

    <!-- External JavaScript -->
    <script src="js/signup.js"></script>

    <!-- BootStrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
  </body>
</html>
