<!DOCTYPE html>
<html>

<head>
     <title>USER SIGN UP</title>
     <link rel="stylesheet" type="text/css" href="css/signup.css">
     <link rel="favicon" href="images/favicon.ico">
</head>

<body>
     <form action="signup_check.php" method="post">
          <h2>USER SIGN UP</h2>
          <?php if (isset($_GET['error'])) { ?>
               <p class="error"><?php echo $_GET['error']; ?></p>
          <?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>


          <table style="overflow-x:auto;" class="tablesignup" align="center">
               <tr>
                    <td>
                         <label>Name <sub style="color: red;">*</sub></label>
                         <?php if (isset($_GET['user_name'])) { ?>
                              <input type="text" name="user_name" placeholder="Name" value="<?php echo $_GET['user_name']; ?>"><br>
                         <?php } else { ?>
                              <input type="text" name="user_name" placeholder="Name"><br>
                         <?php } ?>

                    </td>
               </tr>
               <tr>
                    <td>
                         <label>Phone Number <sub style="color: red;">*</sub></label>
                         <?php if (isset($_GET['user_contactno'])) { ?>
                              <input type="text" name="user_contactno" placeholder="Phone Number" value="<?php echo $_GET['user_contactno']; ?>"><br>
                         <?php } else { ?>
                              <input type="text" name="user_contactno" placeholder="Phone Number"><br>
                         <?php } ?>
                    </td>
               </tr>
               <tr>
                    <td>
                         <label>Email Address <sub style="color: red;">*</sub></label>
                         <?php if (isset($_GET['user_email'])) { ?>
                              <input type="text" name="user_email" placeholder="Email Address" value="<?php echo $_GET['user_email']; ?>"><br>
                         <?php } else { ?>
                              <input type="text" name="user_email" placeholder="Email Address"><br>
                         <?php } ?>

                    </td>
               </tr>
               <tr>
                    <td>
                         <label>Password <sub style="color: red;">*</sub></label>
                         <input type="password" name="user_password" placeholder="Password"><br>
                    </td>
               </tr>
               <tr>
                    <td>
                         <label>Confirm Password <sub style="color: red;">*</sub></label>
                         <input type="password" name="re_password" placeholder="Confirm Password"><br>
                    </td>
               </tr>
               <tr>
                    <td>
                         <label>Address <sub style="color: red;">*</sub></label>
                         <?php if (isset($_GET['user_address'])) { ?>
                              <input type="text" name="user_address" placeholder="Address" value="<?php echo $_GET['user_address']; ?>"><br>
                         <?php } else { ?>
                              <input type="text" name="user_address" placeholder="Address"><br>
                         <?php } ?>

                    </td>
               </tr>
               <tr>
                    <td>
                         <label>State <sub style="color: red;">*</sub></label>
                         <?php if (isset($_GET['user_state'])) { ?>
                              <input type="text" name="user_state" placeholder="State" value="<?php echo $_GET['user_state']; ?>"><br>
                         <?php } else { ?>
                              <input type="text" name="user_state" placeholder="State"><br>
                         <?php } ?>

                    </td>
               </tr>
               <tr>
                    <td>
                         <label>City <sub style="color: red;">*</sub></label>
                         <?php if (isset($_GET['user_city'])) { ?>
                              <input type="text" name="user_city" placeholder="City" value="<?php echo $_GET['user_city']; ?>"><br>
                         <?php } else { ?>
                              <input type="text" name="user_city" placeholder="City"><br>
                         <?php } ?>
                    </td>
               </tr>
               <tr>
                    <td>
                         <label>Zipcode <sub style="color: red;">*</sub></label>
                         <?php if (isset($_GET['user_zipcode'])) { ?>
                              <input type="text" name="user_zipcode" placeholder="Zipcode" value="<?php echo $_GET['user_zipcode']; ?>"><br>
                         <?php } else { ?>
                              <input type="text" name="user_zipcode" placeholder="Zipcode"><br><br>
                         <?php } ?>
                    </td>
               </tr>
               <tr>
                    <td>
                         <label>Security Question <sub style="color: red;">*</sub></label><br>
                         <form method="post">
                              <?php isset($_GET['securityQuestion']) ?>
                              
                              <select class="select" required="required" name="securityQuestion" value="<?php echo $_GET['securityQuestion']; ?>">
                                   <option>What is your nickname?</option>
                                   <option>What is your parents name?</option>
                                   <option>What is your favorite color?</option>
                              </select><br><br>
                         </form>
                    </td>
               </tr>
               <tr>
                    <td>
                         <label>Answer <sub style="color: red;">*</sub></label>
                         <?php if (isset($_GET['securityAnswer'])) { ?>
                              <input type="text" name="securityAnswer" placeholder="Your answer" value="<?php echo $_GET['securityAnswer']; ?>"><br>
                         <?php } else { ?>
                              <input type="text" name="securityAnswer" placeholder="Your answer"><br>
                         <?php } ?>
                    </td>
               </tr>
               <tr>
                    <td>
                         <button type="submit">Sign Up</button><br><br>
                         <input class="create" type="button" onclick="window.location.href='index.php';" value="Already Have Account?"><br>
                    </td>
               </tr>
          </table>


     </form>
</body>

</html>