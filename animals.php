<?php
include_once "_header.php";
include_once "_navbar.php";
include_once "connect_db.php";
?>

<div>
<?php 
$query = "SELECT `Name`,`Bread`,`DateBirdth` FROM `tbl_animals`";
$sth = $dbh->prepare($query);
//run
$sth->execute();
//reader - read data
while($row = $sth->fetch(PDO::FETCH_ASSOC)){

    echo '
    <tr>
    <th scope="row">1</th>
    <td>' .$row["Name"] . '</td>
    <td>' .$row["Bread"] . '</td>
    <td>' .$row["DateBirdth"] . '</td>
    </tr>
    ';
}
?>
</div>

<?php
include_once "_scripts.php";
include_once "_footer.php";
?>