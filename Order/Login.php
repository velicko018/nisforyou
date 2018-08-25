
<?php
session_start();
 $db= new mysqli('localhost','root','','nisforyou') or die("Could not Connect!");
 
$username=$_POST['username'];
$password=$_POST['password'];

if($username&&$password)
{
  $query= $db->query("SELECT * FROM lokal_user WHERE email='{$username}' ");
  $exists= $query->num_rows;
  $user=null;
  if($exists)
  {
     while($row= $query->fetch_object())
     {
         $dbusername=$row->username;
         $dbpassword=$row->password;
         $dbemail=$row->email;
         $user=$row;
     }
     if($username==$dbemail && $password==$dbpassword)
     {
      
         $_SESSION['user1']=$user;
         $message="You are in!<br> Click <a href='OrderTable.php'>HERE</a> to enter";
     }
 else {
          $message="Wrong username or password!<br> Click <a href='index.php'>HERE</a>to try again!";
     }
  }
  else 
  {
      $message="Wrong username or password!<br>Click <a href='index.php'>HERE</a> to try again!";
    
  }
}
else
{
    $message="Wrong username or password!<br>Click <a href='index.php'>HERE</a> to try again!";
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset=utf-8 />
    <title></title>
    <link rel="stylesheet" href="http://www.jacklmoore.com/colorbox/example1/colorbox.css" />
  </head>
  <body background="Css/pozadina.jpg">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://www.jacklmoore.com/colorbox/jquery.colorbox.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
      function openColorBox(){
          var message="<?php echo $message; ?>";
          
        $.colorbox({
            escKey: false,
            overlayClose: false,
            close:"",
            closeButton:false,
            width:"500",
            height:"200",
            html:"<h1>"+message+"</h1>",
            onClosed:function(){parent.location.reload();}
            
        });
        
        
        
      }
      setTimeout(openColorBox, 300);
    </script>
    
  </body>
</html>