<?php  
	switch($_GET['p'])
		{
		case "welcome":			$includepage = "welcome.php";
								$pagecode 	= "welcome";
								break;
		
		case "menu"	: 			$includepage = "menuManager.php";
						  		$pagecode = "menu";
						  		break;
		
		case "aemenu": 			$includepage = "addEditMenu.php";
								$pagecode = "menu";
								break;
		
		case "submenu":			$includepage = "submenuManager.php";
								$pagecode = "menu";
								break;
								
		case "aesubmenu": 		$includepage = "addEditSubmenu.php";
								$pagecode = "menu";
								break;
		case "submenu1":			$includepage = "submenuManager1.php";
								$pagecode = "menu";
								break;								
		case "aesubmenu1": 		$includepage = "addEditSubmenu1.php";
								$pagecode = "menu";
								break;
		
		case "content": 		$includepage = "contentManager.php";
								$pagecode = "content";
								break;
		
		case "aecontent":		$includepage = "addEditContent.php";
								$pagecode = "content";
								break;
		
		case "news":			$includepage = "newsManager.php";
								$pagecode = "news";
								break;
		
		case "aenews":			$includepage = "addEditNews.php";
								$pagecode = "news";
								break;	
		case "horoscope":		$includepage = "HoroscopeManager.php";
								$pagecode = "horoscope";
								break;
		case "addEditHoroscope":$includepage = "addEditHoroscope.php";
								$pagecode = "addEditHoroscope";
								break;
		case "business": 	$includepage = "BusinessManager.php";
								$pagecode = "business";
								break;					
		
		case "addEditBusinessDir":	$includepage = "addEditBusinessDir.php";
								$pagecode = "addEditBusinessDir";
								break;
		
		
		case "addEditPhotogallery": 	$includepage = "addEditPhotogallery.php";
							 	$pagecode = "addEditPhotogallery";
							 	break;
		case "photogallery": 	$includepage = "photogalleryManager.php";
							 	$pagecode = "photogallery";
							 	break;
		case "photocategory": 		$includepage = "photocategoryManager.php";
								$pagecode = "photocategory";
								break;
							 
		case "aecontactusemail": $includepage = "addEditContactUsEmail.php";
								 $pagecode = "contactusemail";
								 break;
								
								
		case "addedittestimonial":	$includepage = "addEditTestimonial.php";
								$pagecode = "addedittestimonial";
								break;
								
		case "bcmanager" : 	$includepage = "BusinessCategoryManager.php";
								$pagecode = "bcmanager";
								break;
		case "aebc" : 	$includepage = "addEditBusinessCategory.php";
								$pagecode = "aebc";
								break;
		case "pcmanager" : 	$includepage = "photoCatManager.php";
								$pagecode = "pcmanager";
								break;
								
		case "addeditnewsletter":	$includepage = "addEditNewsletter.php";
								$pagecode = "addeditnewsletter";
								break;
								
		case "newsletter" : 	$includepage = "newsletterManager.php";
								$pagecode = "newsletter";
								break;
		case "addEditInterview":	$includepage = "addEditInterview.php";
								$pagecode = "addEditInterview";
								break;
		case "interview" :		$includepage = "interviewManager.php";
								$pagecode = "interview";
								break;
		case "addeditcartoon":	$includepage = "addEditCartoon.php";
								$pagecode = "addeditcartoon";
								break;
		case "cartoon" :		$includepage = "CartoonManager.php";
								$pagecode = "cartoon";
								break;
		case "addeditadvertisement":	$includepage = "addEditAdvertisement.php";
								$pagecode = "addeditadvertisement";
								break;
		case "advertisement" :	$includepage = "AdvertisementManager.php";
								$pagecode = "advertisement";
								break;								
								
		case "addeditleftmenu": $includepage = "addEditLeftMenu.php";
								$pagecode = "addeditleftmenu";
								break;
								
		case "leftcontent": $includepage = "leftmenuManager.php";
								$pagecode = "leftcontent";
								break;
								
		case "adminuser": 		$includepage = "adminUsers.php";
								$pagecode = "adminuser";
								break;
		
		case "aeadminuser":		$includepage = "addEditAdminUsers.php";
								$pagecode = "adminuser";
								break;
								
								
		case "generaluser":		$includepage = "usersManager.php";
								$pagecode = "generaluser";
								break;	
								
		case "aegeneraluser":		$includepage = "addEditUsers.php";
								$pagecode = "aegeneraluser";
								break;				
		
		case "usert": 			$includepage = "UsersTypeManager.php";
								$pagecode = "usert";
								break;
								
		case "usertype": 		$includepage = "addEditUsersType.php";
								$pagecode = "usertype";
								break;						
															
		case "changepassword":  $includepage = "changePassword.php";
								$pagecode = "changepassword";
								break;
								
		case "addeditkeynotes":		$includepage = "addEditKeynotes.php";
								$pagecode = "addeditkeynotes";
								break;
		
		case "keynotes": 		$includepage = "keynoteManager.php";
								$pagecode = "keynotes";
								break;
		
		case "addeditbusiness":	$includepage = "addEditBusinessDir.php";
								$pagecode = "addeditbusiness";
								break;
		
		case "business": 		$includepage = "BusinessManager.php";
								$pagecode = "business";
								break;	
		case "comment": 		$includepage = "CommentManager.php";
								$pagecode = "comment";
								break;	
		case "search": 		$includepage = "search.php";
								$pagecode = "search";
								break;	
																		
																
	   default	: 				$includepage = "welcome.php";	
								$pagecode = "welcome";
		}
?>