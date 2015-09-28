<?php
$str = preg_replace("/[^0-9]/", '', $str);
$t = preg_split("/ /","5 мин. 35 сек.",$k);
 if ($t[0]<=60 && $t[2] <=60) 
     {
      if ($t[0] <= 9) 
          $t[0] = '0'.$t[0];
      else 
          $t[0]=$t[0];
      if ($t[2] <= 9) 
          $t[2] = '0'.$t[2] ; 
      else 
          $t[2]=$t[2];
      $res = 'minutes: '.$t[0].'; seconds: '.$t[2];
      echo $res."<br>";
     }
 else echo "Nevirnuy format chacy " ."<br>";

 
 $t_zone = 3*60*60;
$gmdate = gmdate("d_m_Y G:i:s", time()+($t_zone));
echo "Moskow time now is :  $gmdate ."."<br>";



?>;

<?php
$code = '<?php echo \'eval\'; ?>';
 
eval($code);
 
echo ($code);
?>