<!DOCTYPE html>
<html>
<body>
<?php
// Melakukan continue pada $i == 2
for ($i = 0; $i < 5; $i++) {
    if ($i == 2) {
        continue;
    }
    echo "Nilai i: $i <br>";
}
echo "Loop Selesai";
?>
</body>
</html>
