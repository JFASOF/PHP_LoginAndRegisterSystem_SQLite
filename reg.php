<?php
session_start();
    
   if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
               
    class MyDB extends SQLite3
    {
       function __construct()
       {
          $this->open('databaseUsers.db');
       }
    }
    $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
     // echo "basarili\n";
   }

   $sql ="INSERT INTO ADMIN (USERNAME, EMAIL,PASSWORD)
   VALUES ('".$_POST["usr_name"]."','".$_POST["email"]."', '".$_POST["pwd"]."');";



   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
    echo '<script>alert("Kayıt Başarılı")</script>';
   }
   $db->close();

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Portfolyö Kayıt Ekranı</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"></head>
<body>

<div class="container">
  <h2 class="display-1">Portfolyö Kayıt Ekranı</h2>
  <form name="frm" method="post" action="#" onsubmit="return isValid()">
    <div class="form-group">
      <label class="form-label">Kullanıcı Adı:</label>
      <input type="text" class="form-control" name="usr_name" placeholder="Kullanıcı Adınızı Giriniz">
    </div>
    <div class="form-group">
      <label class="form-label">Email:</label>
      <input type="text" class="form-control" name="email" placeholder="Emailinizi Giriniz">
    </div>
    <div class="form-group">
      <label class="form-label">Parola:</label>
      <input type="password" class="form-control" name="pwd" placeholder="Parolanızı Giriniz.">
    </div>
    <div class="checkbox">
      <label class="form-label"><input type="checkbox"> Beni Hatırla</label>
    </div>
    <button type="submit" class="btn btn-success">Kayıt Ol</button>
    <a href="login.php" class="btn btn-primary">Giriş Yap</a>
  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script> 
function isValid()
{
    var kadi = document.forms["frm"]["usr_name"].value;
    var sifre = document.forms["frm"]["pwd"]value;
    if ( kadi==null || kadi=="" || kadi.length < 2 )
    {
        alert("Kullanıcı Adı Boş Geçilemez ve Kullanıcı Adı 4 Karakterden Uzun Olmalıdır.");
        return false;
    }
    if (sifre==null || sifre==" "|| sifre.length<4) {
       alert("Şifre Boş Geçilemez ve Şifre 4 Karakterden Uzun Olmalıdır.")
    }
}
</script>
</body>
</html>