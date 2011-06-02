<?php
header("Content-type: text/html; charset=utf-8");
setlocale(LC_ALL, 'en_US.UTF-8');
?>
<?php
if(isset($_POST['submit']))
{
    $import = $_POST['import'];
    $export = $_POST['export'];
    if(empty($import) or empty($export))
    {
        $message = "<font color='#ff0000'>請輸入要比對的檔案</font>";   
    }
    else
    {
        $import_file = $import;
        $export_file = $export;
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
                        /*
                        if($ar[0] === $ar2[0] AND $ar[1] === $ar2[1] AND $ar[3] === $ar2[3] AND $ar[4] === $ar2[4] AND $ar[2] === $ar2[2])
                        {
                            //echo "<font color='#FF0000'>". $ar[0] . ", " . $ar[1] .", ".  htmlspecialchars($ar[2]) .", ". $ar[3] .", ". $ar[4]."</font><br />";
                            $compare = 1;
                            break;
                        }
                        */
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
    }
}
?>
<hr />
<div id="message"><?=$message;?></div>
<div id="form">
<form name="form1" id="form1" action="csv_compare_v2.php" method="post">
<div class="text">import: <input type="text" name="import" id="import" size="30" value="<?=$import;?>"></div>
<div class="text">export: <input type="text" name="export" id="export" size="30" value="<?=$export?>"></div>
<div class="button"><input type="submit" name="submit" id="submit" value="compare"></div>
</form>
</div>