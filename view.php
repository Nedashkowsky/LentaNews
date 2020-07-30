<style type="text/css" media="all">
    @import url("style.css");
</style>

<?php
include 'db.php';

$row['id'] = $_REQUEST['id'];

$q = "SELECT content, title FROM news WHERE id = $row[id]";
$res = mysqli_query($link, $q) or die(mysqli_error($link));
$row = mysqli_fetch_array($res);

echo "<h1 style='border-bottom: 1px dotted #832b5b; margin-bottom: 20px'>$row[title]</h1>";
echo "<p>$row[content]</p>";
echo "<p style='border-bottom: 1px dotted #832b5b; margin-bottom: 20px'></p>";

mysqli_close($link);
?>
<a href="news.php">Все новости >></a>