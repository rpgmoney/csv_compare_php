<?php
header("Content-type: text/html; charset=utf-8");
setlocale(LC_ALL, 'en_US.UTF-8');

$import_file = "data1_2_1_import.csv";
$export_file = "data1_2_1_export.csv";
$fp1 = fopen("$import_file","r");

$rows = 0;
while(($ar = fgetcsv($fp1, 1000, ",")) != false)
{
    if(0 !== $rows)
    {
        $rows2 = 0;
        $fp2 = fopen("$export_file","r");
        $compare = 0;
        while(($ar2 = fgetcsv($fp2, 1000, ",")) != false)
        {
            if(0 !== $rows2)
            {
                if($ar[0] === $ar2[0] AND $ar[1] === $ar2[1] AND $ar[3] === $ar2[3] AND $ar[4] === $ar2[4] AND $ar[2] === $ar2[2])
                {
                    //echo "<font color='#FF0000'>". $ar[0] . ", " . $ar[1] .", ".  htmlspecialchars($ar[2]) .", ". $ar[3] .", ". $ar[4]."</font><br />";
                    $compare = 1;
                    break;
                }
            }
            $rows2++;
        }
        fclose($fp2);
        if(0 === $compare)
        {
            echo $ar[0]. ", " . $ar[1] . ", " . htmlspecialchars($ar[2]) . ", ". $ar[3] . ", " . $ar[4] . "<br / >";
        }
    }
    $rows++;
}
fclose($fp1);
?>
