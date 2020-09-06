<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>JEC RoboWorld</title>

  </head>
  <body>
    <?php




          /* Attempt MySQL server connection. Assuming you are running MySQL
          server with default setting (user 'root' with no password) */
          $link = mysqli_connect("localhost", "root", "pass@123", "roboworld");

          // Check connection
          if($link === false){
              die("ERROR: Could not connect. " . mysqli_connect_error());
          }

          // Escape user inputs for security
          $name = mysqli_real_escape_string($link, $_REQUEST['name']);
          $roll = mysqli_real_escape_string($link, $_REQUEST['roll']);
          $branch = mysqli_real_escape_string($link, $_REQUEST['branch']);
          $gender = mysqli_real_escape_string($link, $_REQUEST['gender']);
          $email = mysqli_real_escape_string($link, $_REQUEST['email']);
          $phone = mysqli_real_escape_string($link, $_REQUEST['phone']);
          $place = mysqli_real_escape_string($link, $_REQUEST['place']);
          $uname = mysqli_real_escape_string($link, $_REQUEST['uname']);
          $pword = mysqli_real_escape_string($link, $_REQUEST['pword']);

          // attempt insert query execution
          $sql = "INSERT INTO registration (name, roll, branch, gender, email, phone, residence, username, password, cur_datetime) VALUES ('$name', '$roll', '$branch','$gender', '$email', '$phone', '$place', '$uname', '$pword', now())";
          // $sql = "INSERT INTO registration (name, roll, branch, phone, cur_datetime) VALUES ('$name', '$roll', '$branch', '$phone', now())";
          if(mysqli_query($link, $sql)){
              echo "Records added successfully.";
          } else{
              echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
          }

          // close connection
          mysqli_close($link);


      $dir ="./member_pic/" . $name . "--" . $phone;
       mkdir($dir,0777,true);

       // Check if the form was submitted
     if($_SERVER["REQUEST_METHOD"] == "POST"){
         // Check if file was uploaded without errors
         if(isset($_FILES["pic"]) && $_FILES["pic"]["error"] == 0){
             $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
             $filename = $_FILES["pic"]["name"];
             $filetype = $_FILES["pic"]["type"];
             $filesize = $_FILES["pic"]["size"];

             // Verify file extension
             $ext = pathinfo($filename, PATHINFO_EXTENSION);
             if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

             // Verify file size - 10MB maximum
             $maxsize = 10 * 1024 * 1024;
             if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

             // Verify MYME type of the file
             if(in_array($filetype, $allowed)){
                 // Check whether file exists before uploading it
                 if(file_exists("". $dir ."/" . $_FILES["pic"]["name"])){
                     echo $_FILES["pic"]["name"] . " already exists.";
                 } else{
                     move_uploaded_file($_FILES["pic"]["tmp_name"], "". $dir ."/" . $_FILES["pic"]["name"]);
                     echo "Your file was uploaded successfully.";
                 }
             } else{
                 echo "Error: There was a problem uploading your file. Please try again.";
             }
         } else{
             echo "Error: " . $_FILES["pic"]["error"];
         }
     }



          header( "refresh:15;url=./index.php" );
    ?>
    <h1> Thank You!!<h1>
    <h2> Please pay Rs.150 during the Orientation program to complete the registration process.<h2>
    <p> Transparency is our top priority. This amount will be used to create your RoboWorld ID. Please follow our facebook page to stay updated with the latest news. </p>
    <p> You will be redirected to jecroboworld.in in <span id="time"></span> </p>

  <script type="text/javascript">
      var timeleft = 15;
      var downloadTimer = setInterval(function(){

      document.getElementById("time").innerHTML = "" + timeleft--;
      if(timeleft <= 0)
      clearInterval(downloadTimer);
      },1000);
  </script>
  </body>

</html>
