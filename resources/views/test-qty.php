<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <style>
  table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>
<body>
<table>
  <tr>
    <th>S.no</th>
    <th>Name</th>
    <th>phone</th>
    <th>subject</th>
    <th>class</th>
  </tr>



   <?php
   $sno=1;
   $name=['sinita','rahul','jyoti','aman','rakesh'];
   for($i=1;$i<count($name);$i++)
   {


   ?>
     <tr>
    <td><?= $sno;?></td>
    <td><?php echo $name[$i]; ?></td>
    <td>9876543221</td>
    <td>evs</td>
    <td>class1</td>
    </tr>
    <?php
    $sno++;
   }
    ?>


</table>

</body>
</html>
