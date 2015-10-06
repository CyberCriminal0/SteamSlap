<?php 
$output = shell_exec('git pull');

?>
<html>
<body>
<p>
<?php
echo $output;
?>
</p>
</body>
</html>


