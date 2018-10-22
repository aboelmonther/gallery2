<?php  require_once "includes/header.php"; ?>
<?php  require_once "admin/includes/init.php"; ?>





 <?php
 
 if(isset($_POST['submit']))
 {
    $to      = "robinkartik@yahoo.com";
    $header  = mysqli_real_escape_string($connection, trim($_POST['email']));
    $subject = mysqli_real_escape_string($connection, trim(wordwrap($_POST['subject'], 70)));
    $body    = mysqli_real_escape_string($connection, trim($_POST['body']));

    mail($to, $subject, $body, "From: " . $header);

    echo "Your email has been sent. :)";
   
 }
 
 
 ?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <?php
//
//        $user = new User();
//        $user->username = "monther first name";
//        $user->password = "bebo last name";
//        $user->user_firstname = "Tote";
//        $user->user_lastname = "tota";
//        $user->create();

//        $user = new User();
//
//        $result_set = $user->find_all_users();
//
//         while($row = mysqli_fetch_array($result_set)) {
//
//             echo $row['username'] . '<br>';
//         }
////
//             $result_set = User::find_all_users();
//
//            while($row = mysqli_fetch_array($result_set)) {
//
//            echo $row['username'] . '<br>';
//        }
//
//            $found_user = User::find_user_by_id(22);
//
//
//            $user = User::instantation($found_user);
//
//            echo $user->username;
//            echo "

//        $users = User::find_all_users();
//        foreach ($users as $user) {
//         echo $user->user_id . "<br>";
//        }

//        $found_user = User::find_user_by_id(20);
//
//        echo $found_user->username;


//        $pictures = new Picture();

/////////////////////////////////////////////


        $user = new User();
        $user->username = "userName";
        $user->password = "password";
        $user->user_firstname = "mon";
        $user->user_lastname = "no";
        $user->create();

        //if(!$user->create()) {
        // die("Query Failed" . mysql_error($database->connection));}

/////////////////////////////////////////////////////////
//
//
//        $user = User::find_user_by_id(22);
//        $user->username = "basem";
//        $user->password = "12345";
//        $user->user_firstname = "yahya";
//        $user->user_lastname = "xmen";
//
//        $user->update();

///////////////////////////////////////////////////////
////
//        $user = User::find_user_by_id(31);
//        $user->delete();

        /////////////////////////////////////////////
//
//        $user = User::find_user_by_id(35);
//        $user->username = "whatever";
//        $user->save();

        /////////
        ///
//
//        $user = new User();
//        $user->username = "whatever_200";
//        $user->save();

        ?>




    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Contact</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                        <div class="form-group">
                            <label for="subject" class="sr-only">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="I want to...">
                        </div>
                         <div class="form-group">
                            <label for="body" class="sr-only">Body</label>
                            <textarea name="body" id="body" cols="30" rows="10" class="form-control" placeholder="Your message here..."></textarea>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn btn-success btn-lg btn-block" value="Send Email">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
