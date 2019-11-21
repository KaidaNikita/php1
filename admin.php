<?php include "_header.php"; ?>


<div class="container">
  <h2>Basic Table</h2>
  <table class="table">
    <thead>
      <tr>  
        <th>Id</th>
        <th>Email</th>
        <th>Password</th>
        <th></th>
      </tr>
    </thead>
    <tbody>

<?php
include_once "connection_database.php";

function DeleteUserById()
{
    $id=$_POST['id'];
    $dbh->exec("DELETE FROM users WHERE Id=$id");
}

$sth = $dbh->prepare("SELECT Id, Email, Password FROM `tbl_users`");
$sth->execute();

while($result = $sth->fetch(PDO::FETCH_ASSOC))
{
    echo '
    <tr>
        <th scope="row">'.$result["Id"].'</th>
        <td>'.$result["Email"].'</td>
        <td>'.$result["Password"].'</td>
        <td><input type="button" class="btnSubmit" onclick="DeleteUser('.$result["Id"].')" value="Видалить"/></td>
    </tr>
    ';
}
?>
    </tbody>
  </table>
</div>


<?php include "_scripts.php"; ?>

<script>
function DeleteUser(id)
{
$(function() {
        $.ajax({
         data: 'Id=' + id,
         url: 'admin.php',
         method: 'POST',
         success: function(msg) {
         //доробити видалення юзера
    }
}); 
})
}

</script>

<?php include "_footer.php"; ?>
