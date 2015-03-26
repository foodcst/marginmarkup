<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>PDF Created</title>

<style type="text/css">

body {
 background-color: #fff;
 margin: 40px;
 font-family: Lucida Grande, Verdana, Sans-serif;
 font-size: 14px;
 color: #4F5155;
}

a {
 color: #003399;
 background-color: transparent;
 font-weight: normal;
}

h1 {
 color: #444;
 background-color: transparent;
 border-bottom: 1px solid #D0D0D0;
 font-size: 16px;
 font-weight: bold;
 margin: 24px 0 2px 0;
 padding: 5px 0 6px 0;
}

code {
 font-family: Monaco, Verdana, Sans-serif;
 font-size: 12px;
 background-color: #f9f9f9;
 border: 1px solid #D0D0D0;
 color: #002166;
 display: block;
 margin: 14px 0 14px 0;
 padding: 12px 10px 12px 10px;
}

</style>
</head>
<body>

<?php //echo "sss";  echo $order; exit;
 //echo "<pre>"; print_r($syncpdf); echo $company_name->company_name;
 ?>
<h1><?php echo $company_name->company_name; ?></h1>


<!--<code><?php  //$message; ?></code>-->
<table border="0">
<tr><th> Sl.No  </th> <th> Item </th> <th>Order </th> <th> Price </th> </tr>
<?php $i=1; foreach($syncpdf as $val) { ?>

<tr> <td> <?php echo $i;?> </td> <td> <?php echo $val->grocery_desc; ?> </td> <td> <?php echo $order; ?> </td> <td> <?php echo $val->sync_price; ?> </td> </tr>

<?php $i++; } ?>
</table>

</body>
</html>