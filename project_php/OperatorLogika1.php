<!DOCTYPE html>
<html lang="en">
<head>
    <title>Zachra Almira Aprilla</title>
</head>
    <body>
<?php
$b = 4!=4;
$c = 3+7 == 10;
$a = ($b and $c);
echo "$a=$a <BR>";
$a = ($b or $c);
echo "$a=$a <BR>";
$a = ($b xor $c);
echo "$a=$a <BR>";
$a = (!$b or $c);
echo "$a=$a <BR>";   
$a = ($b && $c);
echo "$a=$a <BR>";
$a = $b || $c;
echo "$a=$a <BR>";
?>
    </body>
</html>
