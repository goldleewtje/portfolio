<?php
include("header/header.php");
$conn = mysqli_connect("localhost","root","", "phpopdracht");
$result = $conn->query("SELECT * FROM productreparaties");
?> 
<style>
    table
    {
        margin-left:35%;
        margin-top:15px;
        margin-bottom:15px;
    }
</style>
<table border="2px solid">
    <tr> 
    <th>Product </th>
    <th>Beschrijving</th>
    <th>telefoonnummer </th>
    </tr>
<?php
while ($row = mysqli_fetch_assoc($result))
{?>



<tr>
    <td class='Producten'><?php echo $row['Product']?> </td> 
    <td class='Producten'><?php echo $row['Beschrijving']?> </td> 
    <td class='Producten'><?php echo $row['telefoonnummer']?> </td> 
</tr>

<?php }
?>
    </table>
<?php include("Footer.html"); ?>