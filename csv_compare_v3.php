<?php
header("Content-type: text/html; charset=utf-8");
setlocale(LC_ALL, 'en_US.UTF-8');
?>
<?php
require_once 'include/app_top.php';
$query_string = "SELECT * FROM 6";
$rows = $gDbManager->DbGetAll($query_string);
echo "<pre>";
print_r($rows);
echo "</pre>";
$import_file = "data1_6_import.csv";
//$export_file = $export;
/*
$fp1 = @fopen("$import_file","r") or die("檔案無法開啟! \n");

$rows = 0;
$field_count = 1;
while(($ar = fgetcsv($fp1, 1000, ",")) != false)
{
    if(0 !== $rows)
    {
        $rows2 = 0;
        $fp2 = @fopen("$export_file","r") or die("檔案無法開啟! \n");
        $compare = 0;
        while(($ar2 = fgetcsv($fp2, 1000, ",")) != false)
        {
            if(0 !== $rows2)
            {
                
                $e = 0;
                for($i=0;$i<$field_count;$i++)
                {
                    if($ar[$i] !== $ar2[$i])
                    {
                        $e = 1;
                        break;
                    }
                }
                if(0 === $e)
                {
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
    else
    {
        $field_count = count($ar);
    }
    $rows++;
}
fclose($fp1);
*/    
require_once 'include/app_bottom.php';
?>
