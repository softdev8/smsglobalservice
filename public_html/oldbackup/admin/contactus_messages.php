<?php
include_once "isadmin.php";
include_once "lib_constant.php";
?>
<html>
<title><?php echo $ADMIN_TITLE; ?> - Contact Us - Messages</title>
<head>
<script type="text/javascript" src="script/admin.js">
</script>
<link href="css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="652" align="center" cellpadding="0" cellspacing="0" id="admin_table">
<tr>
    <td width="639" class="crown_head"><?php echo $WEBSITE; ?> - Contact Us - Messages</td>
  </tr>
<tr>
  <?php
  	include_once "sub_top.php";
  ?>
</tr>

<tr>
<td valign="top" style="padding-top:5px">
<br/><br/><br/>
<table width="99%"  align="center" cellpadding="4px" cellspacing="2px" id='viewdiv' class="admin_table">
<tr class="topheading" style="font-size:11px; font-weight:normal">
	<th width="23" align="left">Sr#</th>
    <th width="23" align="left">ID</th>
	<th width="88" align="left">Name</th>
   	<th width="90" align="left">Email</th>
    <th width="196" align="left">Messages</th>
    <th width="86" align="left">Send Date</th>
</tr>


<?php
include_once "ez_sql.php";

$contacts = $db->get_results("select * from contactus order by contact_id desc");

$ind=0;
if($contacts)
{
	foreach($contacts as $cus)
	{
		
		
		$ind++;	
		if($ind%2==1)
			echo "<tr class='tr1'>";
		else
			echo "<tr class='tr2'>";
		
		echo "<td align='left'>".$ind."</td>";
		echo "<td align='left'>".$cus->contact_id."</td>";
    	echo "<td align='left'>".$cus->name."</td>";
    	echo "<td align='left'>".$cus->email."</td>";
	   	echo "<td align='left'>".$cus->message."</td>";
		echo "<td align='left'>".$cus->contact_date."</td>";
		echo "</tr>";

	}
}	
?>
<tr><td colspan="5"></td></tr>
</table>
</td>
</tr>
</table>
</body>
</html>