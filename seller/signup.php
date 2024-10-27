<!DOCTYPE html>
<html>

<head>
     <title>SIGN UP SELLER</title>
     <link rel="stylesheet" type="text/css" href="css/signup.css">
     <link rel="favicon" href="img/favicon.ico">

</head>

<body>
     <form action="signup_check.php" method="post" onsubmit="return checkForm(this);" class="form">
          <h2>SIGN UP SELLER</h2>
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
                         <?php if (isset($_GET['seller_name'])) { ?>
                              <input type="text" name="seller_name" placeholder="Name" value="<?php echo $_GET['seller_name']; ?>"><br>
                         <?php } else { ?>
                              <input type="text" name="seller_name" placeholder="Name"><br>
                         <?php } ?>
                    </td>
               </tr>
               <tr>
                    <td>
                         <label>Phone Number <sub style="color: red;">*</sub></label>
                         <?php if (isset($_GET['seller_contactno'])) { ?>
                              <input type="text" name="seller_contactno" placeholder="Phone Number" value="<?php echo $_GET['seller_contactno']; ?>"><br>
                         <?php } else { ?>
                              <input type="text" name="seller_contactno" placeholder="Phone Number"><br>
                         <?php } ?>
                    </td>
               </tr>
               <tr>
                    <td>
                         <label>Email Address <sub style="color: red;">*</sub></label>
                         <?php if (isset($_GET['seller_email'])) { ?>
                              <input type="text" name="seller_email" placeholder="Email Address" value="<?php echo $_GET['seller_email']; ?>"><br>
                         <?php } else { ?>
                              <input type="text" name="seller_email" placeholder="Email Address"><br>
                         <?php } ?>
                    </td>
               </tr>
               <tr>
                    <td>
                         <label>Password <sub style="color: red;">*</sub></label>
                         <input type="password" name="seller_password" placeholder="Password"><br>
                    </td>
               </tr>
               <tr>
                    <td>
                         <label>Re Password <sub style="color: red;">*</sub></label>
                         <input type="password" name="re_password" placeholder="Re_Password"><br>
                    </td>
               </tr>
               <tr>
                    <td>
                         <label>Bank Account <sub style="color: red;">*</sub></label>
                         <?php if (isset($_GET['seller_bank_acc'])) { ?>
                              <input type="text" name="seller_bank_acc" placeholder="Bank Account" value="<?php echo $_GET['seller_bank_acc']; ?>"><br>
                         <?php } else { ?>
                              <input type="text" name="seller_bank_acc" placeholder="Bank Account"><br>
                         <?php } ?>
                    </td>
               </tr>
               <tr>
                    <td>
                         <label>Bank Name <sub style="color: red;">*</sub></label><br>
                         <?php isset($_GET['seller_bank_name']) ?>
                         <form method="post">
                              <select class="select" required="required" name="seller_bank_name" value="<?php echo $_GET['seller_bank_name']; ?>">
                                   <option>Maybank</option>
                                   <option>Public Bank</option>
                                   <option>CIMB Bank</option>
                                   <option>RHB Bank</option>
                                   <option>BSN</option>
                                   <option>Bank Rakyat</option>
                              </select><br>
                         </form>
                         <br>
                    </td>
               </tr>
               <tr>
                    <td>
                         <label>Security Question <sub style="color: red;">*</sub></label><br>
                         <?php isset($_GET['seller_security_question']) ?>
                              <select class="select" required="required" name="seller_security_question" value="<?php echo $_GET['seller_security_question']; ?>">
                                   <option>What is your nickname?</option>
                                   <option>What is your parents name?</option>
                                   <option>What is your favorite color?</option>
                              </select><br>
                         <br>
                    </td>
               </tr>
               <tr>
                    <td>
                         <label>Answer <sub style="color: red;">*</sub></label>
                         <?php if (isset($_GET['seller_security_answer'])) { ?>
                              <input type="text" name="seller_security_answer" placeholder="Your answer" value="<?php echo $_GET['seller_security_answer']; ?>"><br>
                         <?php } else { ?>
                              <input type="text" name="seller_security_answer" placeholder="Your answer"><br>
                         <?php } ?>
                    </td>
               </tr>
               <tr>
                    <td>
                         <label>Address <sub style="color: red;">*</sub></label>
                         <?php if (isset($_GET['seller_address'])) { ?>
                              <input type="text" name="seller_address" placeholder="Address" value="<?php echo $_GET['seller_address']; ?>"><br>
                         <?php } else { ?>
                              <input type="text" name="seller_address" placeholder="Address"><br>
                         <?php } ?>
                    </td>
               </tr>
               <tr>
                    <td>
                         <label>State <sub style="color: red;">*</sub></label>
                         <?php if (isset($_GET['seller_state'])) { ?>
                              <input type="text" name="seller_state" placeholder="State" value="<?php echo $_GET['seller_state']; ?>"><br>
                         <?php } else { ?>
                              <input type="text" name="seller_state" placeholder="State"><br>
                         <?php } ?>
                    </td>
               </tr>
               <tr>
                    <td>
                         <label>City <sub style="color: red;">*</sub></label>
                         <?php if (isset($_GET['seller_city'])) { ?>
                              <input type="text" name="seller_city" placeholder="City" value="<?php echo $_GET['seller_city']; ?>"><br>
                         <?php } else { ?>
                              <input type="text" name="seller_city" placeholder="City"><br>
                         <?php } ?>
                    </td>
               </tr>
               <tr>
                    <td>
                         <label>Zipcode <sub style="color: red;">*</sub></label>
                         <?php if (isset($_GET['seller_zipcode'])) { ?>
                              <input type="text" name="seller_zipcode" placeholder="Zipcode" value="<?php echo $_GET['seller_zipcode']; ?>"><br>
                         <?php } else { ?>
                              <input type="text" name="seller_zipcode" placeholder="Zipcode"><br>
                         <?php } ?>
                    </td>
               </tr>
               <tr>
                    <td>
                         <button type="submit">Sign Up</button><br><br>
                         <input class="create" type="button" onclick="window.location.href='index.php';" value="Already Have Account?"><br><br><br>
                    </td>
               </tr>
          </table>


     </form>
</body>

</html>