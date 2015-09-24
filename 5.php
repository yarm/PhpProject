<?php
$code = '<?php  echo; \'eval\' ; ?>';
 
eval("\$code =\"$code\";");
var_dump ($code);
?>
<?php
$string = 'cup';
$name = 'coffee';
$str = 'This is a $string with my $name in it.<br>';
echo $str;
eval ("\$str = \"$str\";");
echo $str;
?>

<?php
$code = "<?php echo 'eval';?>";
eval($code);

?>
