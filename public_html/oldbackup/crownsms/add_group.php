<?php
	include_once "iscustomer.php";
	include_once "constants.php";
	$title='Crownsms - Groups - Add Group';
	$mid1='<h4>Groups</h4>';
	$mid2='Add a new group';
	$mid3='';
	$menu12='groups-over.jpg';
	include_once "header.php";

?>

    
<td id="bodybg"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr>
        <td height="15" colspan="2"></td>
      </tr>
      <tr>
        <td width="25%" align="center" valign="top">
        	<?php
				include_once "left_col.php";
			?>
        </td>
        <td valign="top">
	
    <form name="cus_group" id="cus_group" method="post" action="save_group.php" onsubmit="return validGroup()">
   
   	<table width="33%" height="92" align="center" id="mid_tables" >
    
    
    	<tr class="heading">
    	  <th colspan="3">Add New Group</th>
    	</tr>
        <tr>
          <td width="36%" height="28" align="right">Name <span class="red">*</span></td>
        <td width="36%" align="center"><input name="name" type="text" id="name" /></td><td width="28%"><span class="invalid" id='er_name'><img src="images/cross.png" alt=""></span></td>
        </tr>
        <tr>
          <td align="center" colspan="3"><input type="submit" value="Save" class="submit" />
          &nbsp;
          <input type="button" value="Cancel" class="submit" onclick="window.location='groups.php'" /></td></tr>
    </table> 
	</form>

        </td>
      </tr>
      <tr>
        <td height="5" colspan="2" align="center" valign="top"></td>

        </tr>
    </table></td>
  </tr>
<?php
	include_once "footer.php";
?>
