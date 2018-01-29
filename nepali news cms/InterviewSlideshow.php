<script type="text/javascript">
  $(document).ready(function() {
        
        //options( 1 - ON , 0 - OFF)
        var auto_slide = 1;
        var hover_pause = 1;
        var key_slide = 1;
        
        //speed of auto slide(
        var auto_slide_seconds = 3000;
        /* IMPORTANT: i know the variable is called ...seconds but it's 
        in milliseconds ( multiplied with 1000) '*/
        
        /*move he last list item before the first item. The purpose of this is 
        if the user clicks to slide left he will be able to see the last item.*/
        $('#carousel_ul li:first').before($('#carousel_ul li:last')); 
        
        //check if auto sliding is enabled
        if(auto_slide == 1){
            /*set the interval (loop) to call function slide with option 'right' 
            and set the interval time to the variable we declared previously */
            var timer = setInterval('slide("right")', auto_slide_seconds); 
            
            /*and change the value of our hidden field that hold info about
            the interval, setting it to the number of milliseconds we declared previously*/
            $('#hidden_auto_slide_seconds').val(auto_slide_seconds);
        }
  
        //check if hover pause is enabled
        if(hover_pause == 1){
            //when hovered over the list 
            $('#carousel_ul').hover(function(){
                //stop the interval
                clearInterval(timer)
            },function(){
                //and when mouseout start it again
                timer = setInterval('slide("right")', auto_slide_seconds); 
            });
  
        }
  
        //check if key sliding is enabled
        if(key_slide == 1){
            
            //binding keypress function
            $(document).bind('keypress', function(e) {
                //keyCode for left arrow is 37 and for right it's 39 '
                if(e.keyCode==37){
                        //initialize the slide to left function
                        slide('left');
                }else if(e.keyCode==39){
                        //initialize the slide to right function
                        slide('right');
                }
            });

        }
        
        
  });

//FUNCTIONS BELLOW

//slide function  
function slide(where){
    
            //get the item width
            var item_width = $('#carousel_ul li').outerWidth() + 10;
            
            /* using a if statement and the where variable check 
            we will check where the user wants to slide (left or right)*/
            if(where == 'left'){
                //...calculating the new left indent of the unordered list (ul) for left sliding
                var left_indent = parseInt($('#carousel_ul').css('left')) + item_width;
            }else{
                //...calculating the new left indent of the unordered list (ul) for right sliding
                var left_indent = parseInt($('#carousel_ul').css('left')) - item_width;
            
            }
            
            
            //make the sliding effect using jQuery's animate function... '
            $('#carousel_ul:not(:animated)').animate({'left' : left_indent},500,function(){    
                
                /* when the animation finishes use the if statement again, and make an ilussion
                of infinity by changing place of last or first item*/
                if(where == 'left'){
                    //...and if it slided to left we put the last item before the first item
                    $('#carousel_ul li:first').before($('#carousel_ul li:last'));
                }else{
                    //...and if it slided to right we put the first item after the last item
                    $('#carousel_ul li:last').after($('#carousel_ul li:first')); 
                }
                
                //...and then just get back the default left indent
                $('#carousel_ul').css({'left' : '-210px'});
            });
           
}
  
</script>
<style type="text/css">
#sab_wrap{
float:left; /* important for inline positioning */
width:199px; /* important (this width = width of list item(including margin) * items shown */ 
overflow: hidden;  /* important (hide the items outside the div) */
/* non-important styling bellow */
xbackground: #F0F0F0;
margin-left:5px;
xborder:1px solid #C60;
}

#carousel_ul {
position:static;
left:-210px; /* important (this should be negative number of list items width(including margin) */
list-style-type: none; /* removing the default styling for unordered list items */
margin: 0px;
padding: 0px;
width:9999px; /* important */
/* non-important styling bellow */
padding-bottom:10px;
}

#carousel_ul li{
float: left; /* important for inline positioning of the list items */                                    
width:95px;  /* fixed width, important */
/* just styling bellow*/
padding:0px;
height:70px;
background: #FFF;
margin-top:10px;
margin-bottom:10px; 
margin-left:0px; 
margin-right:10px; 
}

#carousel_ul li img {
.margin-bottom:-4px; /* IE is making a 4px gap bellow an image inside of an anchor (<a href...>) so this is to fix that*/
/* styling */
cursor:pointer;
cursor: hand; 
border:0px; 
}
#lefter_scrollj, #righter_scrollj{
float:left; 
height:87px; 
width:10px; 
xbackground: #C0C0C0; 
margin-left:15px;
}
#lefter_scrollj img, #righter_scrollj img{
border:0; /* remove the default border of linked image */
/*styling*/
cursor: pointer;
cursor: hand;

}
</style>

  <div id='carousel_container'>
  <div id='lefter_scrollj'><a href='javascript:slide("left");'><img src='images/left.png' /></a></div>
    <div id='sab_wrap'>
        <ul id='carousel_ul'>
        <?php
			//include_once("includes/db_connection.php");
			$query =mysql_query("SELECT * FROM tbl_interview ORDER BY published_date DESC LIMIT 7");
				while($row=mysql_fetch_array($query)){ 
					echo "<li><a href='index.php?jpg=interview&jID=".$row['id']."' title='".$row['subject']."'><img src=vignette.php?f=images/uploaded/".$row['files']."&w=62&h=95>	</a></li>";
				}			
			?>
           
            
        </ul>
    </div>
  <div id='righter_scrollj'><a href='javascript:slide("right");'><img src='images/right.png' /></a></div>
  <input type='hidden' id='hidden_auto_slide_seconds' value=0 />
  </div>