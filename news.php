<h1 style="border-bottom: 1px dotted #832b5b; margin-bottom: 20px">Новости</h1>
<style type="text/css" media="all">
    @import url("style.css");
</style>

<?php
include 'db.php';

$per_page = 5;
$current_page = 0;
if (isset($_GET['page']) && $_GET['page'] > 0)
{
    $current_page = $_GET['page'];
}

$result = mysqli_query($link, "SELECT * FROM news ORDER BY idate DESC Limit $current_page,$per_page")
        or die(mysqli_error($link));

$q_date = "select *, FROM_UNIXTIME(idate,'%d.%m.%Y') as idate FROM news 
            ORDER BY idate DESC  Limit $current_page,$per_page";
$date_res = mysqli_query($link, $q_date)
            or die (mysqli_error($link));

    while ($row = mysqli_fetch_array($result)) {
        $new_date = mysqli_fetch_assoc($date_res);
        echo "<div>";
        echo "<span style='background-color: #832b5b; color: white; padding: 2px'>$new_date[idate]</span> 
          <a href='view.php?id=$row[id]'> $row[title]</a>";
        echo "<p style='margin-top: 10px'>$row[announce]</p>";
        echo "</div>";
    }

$qres = mysqli_query($link,"SELECT count(*) FROM news");
$qrow = mysqli_fetch_row($qres);
$quan_row = ceil($qrow[0] / $per_page);

echo "<div style='border-bottom: 1px dotted #832b5b; margin-bottom: 15px; margin-top: 20px'></div>";
echo "<h3 style='margin-bottom: 5px'>Страницы:</h3>";
for($i = 1; $i <= $quan_row; $i++) {
            echo "<a class='number' href=" . $_SERVER['PHP_SELF'] . "?page=" . $i . " >
                    <button >" . $i . "</button></a>";
}

mysqli_close($link);
?>