<?php $vo = new UsersVO();
	$dao = new UsersDAO();
	$vo->username = $_POST['user'];
	$vo->password = md5($_POST['password']);
	//$id = $dao->authenticate($vo)
	 $_SESSION['usertype'];
	//if())
	// {?>
<div id="button">
	<ul>
		<li <?php if($pagecode=="welcome") echo "id=\"currentMenu\"";?>><a href="index.php?p=welcome">Home Page</a></li>
	</ul>
</div>
<div id="button">
   <ul>	
    <li <?php if($pagecode=="generaluser") echo "id=\"\"";?> style="padding:5px; height:15px; background-color:#ccc;"><a href="#">Content Manager</a></li>
    <li <?php if($pagecode=="aemenu") echo "id=\"currentMenu\"";?>><a href="index.php?p=aemenu">Add/Edit Menu</a></li> 	
    <li <?php if($pagecode=="menu") echo "id=\"currentMenu\"";?>><a href="index.php?p=menu">Menu Manager</a></li>
    <li <?php if($pagecode=="content") echo "id=\"currentMenu\"";?>><a href="index.php?p=content">Manage Contents</a></li>
    </ul>
</div>

<div id="button">
   <ul>	
    <li <?php if($pagecode=="generaluser") echo "id=\"\"";?> style="padding:5px; height:15px; background-color:#ccc;"><a href="#">Sahitya Manager</a></li>
    <li <?php if($pagecode=="addeditleftmenu") echo "id=\"currentMenu\"";?>><a href="index.php?p=addeditleftmenu&function=add">Add Content</a></li> 	
    <li <?php if($pagecode=="leftcontent") echo "id=\"currentMenu\"";?>><a href="index.php?p=leftcontent">Manage Contents</a></li>
   </ul>
</div

><div id="button">
	<ul>
	<li <?php if($pagecode=="generaluser") echo "id=\"\"";?> style="padding:5px; height:15px; background-color:#ccc;"><a href="#">News/Article Manager</a></li>
    <li <?php if($pagecode=="addeditnewsletter") echo "id=\"currentMenu\"";?>><a href="index.php?p=addeditnewsletter&function=add">Add News/Article </a></li>
    <li <?php if($pagecode=="newsletter") echo "id=\"currentMenu\"";?>><a href="index.php?p=newsletter">Manage News/Article </a></li>   
  </ul>
</div>
<div id="button">
	<ul>
	<li <?php if($pagecode=="generaluser") echo "id=\"\"";?> style="padding:5px; height:15px; background-color:#ccc;"><a href="#">Interview Manager</a></li>
    <li <?php if($pagecode=="addEditInterview") echo "id=\"currentMenu\"";?>><a href="index.php?p=addEditInterview&function=add">Add Interview </a></li>
    <li <?php if($pagecode=="interview") echo "id=\"currentMenu\"";?>><a href="index.php?p=interview">Manage Interview </a></li>   
  </ul>
</div>
<div id="button">
	<ul>
		<li <?php if($pagecode=="generaluser") echo "id=\"\"";?> style="padding:5px; height:15px; background-color:#ccc;"><a href="#">Gallery  Manager</a></li>
      <li <?php if($pagecode=="addEditPhotogallery") echo "id=\"currentMenu\"";?>><a href="index.php?p=addEditPhotogallery&function=add">Add Images</a></li>
      <li <?php if($pagecode=="photogallery") echo "id=\"currentMenu\"";?>><a href="index.php?p=photogallery">Manage Gallery</a></li>
		
	</ul>
</div>
<div id="button">
	<ul>
		<li <?php if($pagecode=="generaluser") echo "id=\"\"";?> style="padding:5px; height:15px; background-color:#ccc;"><a href="#">Cartoon Manager</a></li>
		<li <?php if($pagecode=="addeditcartoon") echo "id=\"currentMenu\"";?>><a href="index.php?p=addeditcartoon&function=add">Add Cartoon </a></li>
        <li <?php if($pagecode=="cartoon") echo "id=\"currentMenu\"";?>><a href="index.php?p=cartoon">Cartoon Manager </a></li>
	</ul>
</div>
<div id="button">
	<ul>
		<li <?php if($pagecode=="generaluser") echo "id=\"\"";?> style="padding:5px; height:15px; background-color:#ccc;"><a href="#">Advertisement Manager</a></li>
		<li <?php if($pagecode=="addeditadvertisement") echo "id=\"currentMenu\"";?>><a href="index.php?p=addeditadvertisement&function=add">Add Advertisement</a></li>
        <li <?php if($pagecode=="advertisement") echo "id=\"currentMenu\"";?>><a href="index.php?p=advertisement">Advertisement Manager </a></li>
	</ul>
</div>
<div id="button">
	<ul>
		<li <?php if($pagecode=="generaluser") echo "id=\"\"";?> style="padding:5px; height:15px; background-color:#ccc;"><a href="#">Business Dir Manager</a></li>
	  <li <?php if($pagecode=="addEditBusinessDir") echo "id=\"currentMenu\"";?>><a href="index.php?p=addEditBusinessDir&function=add">Add Business Dir</a></li>
      <li <?php if($pagecode=="business") echo "id=\"currentMenu\"";?>><a href="index.php?p=business">Business Dir Manager </a></li>
		
	</ul>
</div>
<div id="button">
	<ul>
		<li <?php if($pagecode=="generaluser") echo "id=\"\"";?> style="padding:5px; height:15px; background-color:#ccc;"><a href="#">Horoscope Manager</a></li>
	  	<li <?php if($pagecode=="addEditHoroscope") echo "id=\"currentMenu\"";?>><a href="index.php?p=addEditHoroscope&function=add">Add Horoscope</a></li>
        <li <?php if($pagecode=="horoscope") echo "id=\"currentMenu\"";?>><a href="index.php?p=horoscope">Horoscope Manager </a></li>
		
	</ul>
</div>
<div id="button">
	<ul>
	<!--	<li <?php //if($pagecode=="adminuser") echo "id=\"currentMenu\"";?> style="padding:5px; height:30px; background-color:#ccc;"><a href="#">Site Configuration & User Manager</a></li-->
		<li style="padding:5px; height:15px; background-color:#ccc;"><a href="logout.php">Logout</a></li>
	</ul>
</div>
