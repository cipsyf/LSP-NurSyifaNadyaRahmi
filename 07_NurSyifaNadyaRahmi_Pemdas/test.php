<html>
<head>
    <title>Penjumlahan Dengan PHP</title>
</head>
<body>
    <form name="form1" action="" method="POST">
    <input type="text" name="angka1"> + 
    <input type="text" name="angka2">
    <input type="submit" name="submit" value="=">
    <?php
        $jumlah=$_POST[angka1]+$_POST[angka2];
        echo"<input type=text name=jumlah value='$jumlah'>";
    ?>
<body>
</html>