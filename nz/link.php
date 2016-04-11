<?php
try {
	$dbh = new pdo("mysql:host=localhost;dbname=array", "dbname", "password");
	    }
catch (Exception $e) {
    echo '<p>', $e->getMessage(), '</p>';
	exit;
}

if (isset($_POST['submit'])) {
$a = array(
    "class" => "menu",
    "url" => ($_POST['url']),
    "text" => ($_POST['text'])
	);
   $keys = array_keys($a);
    $sql = "INSERT INTO data (".implode(", ",$keys).") \n";
    $sql .= "VALUES ( :".implode(", :",$keys).")";        
    $q = $dbh->prepare($sql);
    return $q->execute($a);
}

?>

<link rel="stylesheet" type="text/css" href="../css/five.css" />

<form class="basic-grey" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<p><strong><label for="url">url:</label></strong> <input type="text" name="url" name="url" size="40" /></p>
<p><strong><label for="text">text:</label></strong> <input type="text" name="text" name="text" size="40" /></p>
<p><input type="submit" name="submit" id="submit" value="Submit"></p>
</form>