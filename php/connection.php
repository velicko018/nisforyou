<?php // 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    

    function insertUser($u,$p,$n,$e,$a,$t,$age)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "nisforyou";

        if(strlen($u)>15)
        {
            if($_SESSION['lng']=="eng")
            echo '<script type="text/javascript">alert("Username length must be shorter than 15 characters.");</script>';
             if($_SESSION['lng']=="srb")
            echo '<script type="text/javascript">alert("Dužina korisničkog imena mora biti najvise 15 karaktera.");</script>';
             return;
        }

        if(strlen($p) <6)
        {
            if($_SESSION['lng']=="eng")
            echo '<script type="text/javascript">alert("Password length must be six or more letters.");</script>';
             if($_SESSION['lng']=="srb")
            echo '<script type="text/javascript">alert("Dužina lozike mora biti najmanje 6 karaktera");</script>';
             return;
        }

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $conn->set_charset("utf8");
        // Check connection
        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        } 
        $reg_date = date("Y-m-d");
        $sql = "select * from user where username = '$u'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)
        {
            if($_SESSION['lng']=="eng")
            echo '<script type="text/javascript">alert("This username already exists.");</script>';
             if($_SESSION['lng']=="srb")
            echo '<script type="text/javascript">alert("Ovo korisničko ime već postoji.");</script>';
             return;
        }
        $sql = "select * from user where email = '$e'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)
        {
            if($_SESSION['lng']=="eng")
            echo '<script type="text/javascript">alert("This e-mail is already registred.");</script>';
             if($_SESSION['lng']=="srb")
            echo '<script type="text/javascript">alert("Ovaj e-mail je vec registrovan.");</script>';
             return;
        }
    
        
        $sql = "INSERT INTO User (username,password,name,email,address,telephone,birthyear,reg_date,admin)"
                . "VALUES('$u','$p','$n','$e','$a','$t','$age','$reg_date',0)"; 
        

        if (mysqli_query($conn, $sql) === TRUE) 
        {
             if($_SESSION['lng']=="eng")
             echo '<script type="text/javascript">alert("You have successfully signed up.");</script>';
             if($_SESSION['lng']=="srb")
             echo '<script type="text/javascript">alert("Uspešmo ste se registrovali.");</script>';
        }
        else 
        {
            if($_SESSION['lng']=="eng")
            echo '<script type="text/javascript">alert("Registration unsuccessful");</script>';
             if($_SESSION['lng']=="srb")
            echo '<script type="text/javascript">alert("Registacija neuspešna.");</script>';
        }
        $conn->close();
    }
    function Login($un,$pass)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "nisforyou";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $conn->set_charset("utf8");
        // Check connection
        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM User
                WHERE username='$un'
                AND password='$pass';";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)
        {
            $row = mysqli_fetch_assoc($result);
            $n=$row['name'];
            $e=$row['email'];
            $a=$row['address'];
            $t=$row['telephone'];
            $age=$row['birthyear'];
            $reg=$row['reg_date'];
            $admin  = $row['admin'];
            $user = new User($un,$pass,$n,$e,$a,$t,$age,$reg,$admin);
            $conn->close();
            return $user;
            
        }
        else 
        {
            if($_SESSION['lng']=="eng")
            echo "<script>alert('Wrong uername or password.');</script>";
            if($_SESSION['lng']=="srb")
            echo "<script>alert('Pogrešno korisničko ime ili lozinka.');</script>";
            return null;
        }
        $conn->close();
    } 
    
    function LoginForm()
    {
        echo '
              <form action="" method="POST">';
                if($_SESSION['lng']=="eng")
                    echo '<span>Username:</span><br>';
                if($_SESSION['lng']=="srb")
                    echo '<span>Korisničko ime:</span><br>';
                echo '<input type="text" id="un" name="logun"><br>';
                if($_SESSION['lng']=="eng") echo '<span>Password:</span><br>';
                if($_SESSION['lng']=="srb") echo '<span>Lozinka:</span><br>';
                echo '
                <input type="password" id="pass" name="logpass"><br>
                <input type="hidden" name="logovanje" value="logovanje">';
                if($_SESSION['loged']==0)
                echo '<input type="submit" class="button"  id ="lbtn" value="Log in"><br>';
                if($_SESSION['loged']==1)
                echo '<input type="submit" class="button" name="logout" id ="lbtn" value="Log out"><br>';
                echo '
                <hr>
                <a id="reg_btn" href="index.php?regform=1" class="button">Register</a>   
            </form>';
    }
    function RegistrationForm()
    {
        echo '<form action="index.php" method="post" id="regform" class="RegistrationForm">';
                       
                        if($_SESSION['lng']=="eng")
                        {
                        echo '<p>Username:</p><input type="text" name="username">
                        <p>Password:</p><input type="password" name="password">
                        <p>Repeat Password:</p><input type="password" name="rpassword">
                        <p>Name:</p><input type="text" name="name">
                        <p>E-mail:</p><input type="email" name="email">
                        <p>Address:</p><input type="text" name="address">
                        <p>Telephone:</p><input type="text" name="telephone">
                        <p>Year of birth:</p>
                        <select name="age">';
                                
                                    $date = date("Y");
                                    for($i=$date-14;$i>$date-100;$i--)
                                    {
                                        echo "<option value=$i>$i</option>";
                                    }    
                        
                        echo '</select><br>
                        <input type="submit" name="register" value="Register" id="registruj_me">';
                        }
                        if($_SESSION['lng']=="srb")
                        {
                        echo '<p>Korisničko ime:</p><input type="text" name="username">
                        <p>Lozinka:</p><input type="password" name="password">
                        <p>Ponovi Lozinku:</p><input type="password" name="rpassword">
                        <p>Ime:</p><input type="text" name="name">
                        <p>E-mail:</p><input type="email" name="email">
                        <p>Adresa:</p><input type="text" name="address">
                        <p>Telefon:</p><input type="text" name="telephone">
                        <p>Godina rođenja:</p>
                        <select name="age">';
                                
                                    $date = date("Y");
                                    for($i=$date-14;$i>$date-100;$i--)
                                    {
                                        echo "<option value=$i>$i</option>";
                                    }    
                        echo '
                        </select><br>
                        <input type="submit" name="register" value="Registruj" id="registruj_me">';
                        }
                        
                    echo '</form>';
    }
    function tryToLogin()
    {
        if(isset($_GET['logujme']) && $_GET['logujme']==1)
        {
            if($_SESSION['loged']==1){
            $_SESSION['user'] = null;
            $_SESSION['loged'] = 0;
            }
        }
        if($_SESSION['loged']==0)
        {
            if(!empty($_POST['logun']) && !empty($_POST['logpass']))
            {
                $_SESSION['user']=Login($_POST['logun'], $_POST['logpass']);
                if($_SESSION['user']!=null)
                $_SESSION['loged']=1;
            }
        }
        
        if($_SESSION['loged']==1 && isset($_POST['logout']))
        {
            if(isset($_POST['logovanje']))
            {
                $_SESSION['user'] = null;
                $_SESSION['loged'] = 0;
                //ss$_SESSION['cart'] = null;
            }
        }
        
    }
    function tryToRegister()
    {
     if(isset($_POST['register']))
         {
       $u = $_POST['username'];
       $p = $_POST['password'];
       $rp = $_POST['rpassword'];
       $n = $_POST['name'];
       $e=$_POST['email'];
       $a = $_POST['address'];
       $t = $_POST['telephone'];
       $age = $_POST['age'];
       if($u=="" || $p=="" || $rp=="" || $n=="" || $e=="" || $a=="" || $t=="" || $age=="")
       {
           if($_SESSION['lng']=="eng")
                {
                    echo "<script>alert('Please fill in all fields.');</script>";
                }
                if($_SESSION['lng']=="srb")
                {
                    echo "<script>alert('Popuni sva polja.');</script>";
                }
                $_SESSION['skroliklik']=1;
       }
       else 
       {
            if($p == $rp)
            {

             insertUser($u, $p, $n, $e, $a, $t, $age);
             include "php/mail.php";
             if($_SESSION['lng'] == "eng")
                sendMail("Registration","Congratulations, you have successfully registered on the nisforyou.",$e);
             if($_SESSION['lng'] == "srb")
                sendMail("Registracija","Čestitamo, uspešno ste se registrovali na nisforyou.",$e);
             $user = new User($u,$p,$n,$e,$a,$t,$age,date('Y-m-d'),0);
             //$_SESSION['user']=$user;
             $_POST['logun'] = $u;
             $_POST['logpass'] = $p;
             if($_SESSION['user']!=NULL)
                     tryToLogin();
            }
            else
            {
                if($_SESSION['lng']=="eng")
                {
                    echo "<script>alert('Passwords are not same.');</script>";
                }
                if($_SESSION['lng']=="srb")
                {
                    echo "<script>alert('Lozinke se ne poklapaju.');</script>";
                }
            }  
        }
   }
    }