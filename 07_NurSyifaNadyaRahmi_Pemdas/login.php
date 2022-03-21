<?php 
session_start(); //mulai session

// check login form submitted 
if(isset($_POST['Submit'])){

// username dan password yang disediakan
$logins = array('userlsp' => 'smkn2bjm');

// cek username yang terkirim dan dijadikan variabel baru
$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
$Password = isset($_POST['Password']) ? $_POST['Password'] : '';

// cek kemunculan username dan password yang tersimpan dalam array
if (isset($logins[$Username]) && $logins[$Username] == $Password) {

// sukses login, set session variables dan menuju ke dashboard (index)
$_SESSION['UserData']['Username']=$logins[$Username];

header("location:index.php");
exit;
} else {

// login tidak berhasil, error message 
echo "<script>alert('Maaf, login tidak berhasil!');window.location=('login.php')</script>";

  }
    }
?>

<html>
  <head>
    <title>Website Sederhana</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css"> 
  </head>
  <body>
<form action="" method="post" name="Login_Form">
  <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="Table">
    <tr>
      <td colspan="2" align="center"><h1>LOG-IN</h1></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><h2>Required Access</h2></td>
    </tr>
    <tr>
      <td align="right">Username:</td>
      <td><input name="Username" placeholder="Masukkan Username" type="text" class="Input" required></td>
    </tr>
    <tr>
      <td align="right">Password:</td>
      <td><input name="Password" placeholder="Masukkan Password" type="password" class="Input" required></td>
    </tr>
    <tr>
      <td> </td>
      <td><button name="Submit" type="submit" value="Login">LOGIN</button></td>
    </tr>
  </table>
</form>
</body>
</html>