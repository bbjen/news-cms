<?php
	$cdao = new CommentDAO();
	$total=$cdao->countAll();
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr style="background-color:#999999;">
    <td width="16%" height="144" align="left"><a href="index.php?p=welcome"><img src="images/safety_lock.jpg" width="160" height="126"  border="0"/></a></td>
    <td width="83%" height="144" align="center" id="logotxt">Okaytimes.COM- Website Administration Panel</td>
  </tr>
  <tr>
    <td colspan="2" style="background-color:#efefef; height:40px; border-bottom:1px solid #999;">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="77%" height="40" align="left">
		&nbsp;&nbsp;&nbsp;<strong>Welcome: </strong> <span class="medium"><?php echo $_SESSION['admin'];?></span><br/>
		&nbsp;&nbsp;&nbsp;<strong>Last Login: </strong><span class="medium"><?php echo $_SESSION['lastlogin'];?></span> 
		</td>
        <td height="40" align="right"><a href="index.php?p=comment">Comment Manager</a><?php echo "(<font color='red'><b>".$total."</b></font>)"; ?>
		<a href="logout.php" class="topLink">Logout</a>&nbsp;&nbsp;&nbsp;</td>
        </tr>
    </table></td>
  </tr>
</table>