<?php
   require_once 'dbconfig.php';  
    // if(chkLogin()){
    //     header("Location: home.php");
    // }

    if(isset($_POST['_login_user']) ==1 ){     
        global $connectmanager;
        $result = array();
        $email = $_POST['email'];
        $upass = md5( trim( $_POST['password1'] ) );    
        
        //check if user exist  
        $filter = [ 'email' => $email ];
        $options = [   'projection' => ['_id' => 0]  ];
        $querycheckuser = new \MongoDB\Driver\Query($filter, $options);    
        $cursor = $connectmanager->executeQuery('ecommercestore.users', $querycheckuser);

        $cursorArray =  $cursor->toArray();
        if(isset($cursorArray[0])) {
            // user exist, fetch details 
            $checkpass =  $cursorArray[0]->password;

            // if(password_verify($upass,$checkpass)){

            if( $upass == $checkpass ){
                $_SESSION["uname"] = $cursorArray[0]->firstname;
                $_SESSION["email"] = $cursorArray[0]->email;
                header("Location: index.php");
            }
            else{
                echo "You have entered a wrong password!";
                echo "<br>";
                echo "Either <a href='register_user.php'>Register</a> with the new Email ID or <a href='login.php'>Login</a> with an already registered ID";
           
            }          
        }
        else
        {
          // echo "email not found!, add record";
          echo "Email not registered, <a href='register_user.php'>Register new </a>!";
           
        }  
    }

?>