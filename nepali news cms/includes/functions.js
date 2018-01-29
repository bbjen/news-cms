// JavaScript Document

var field_main;
function go_out(bool)
{
	if(bool)	
	{	
		alert(1);
	}
	else
	{
		alert(0);	
	}
}
function do_blink(field)
{
	var errorcolor="#CC0033";
	field.focus();
	field.select();
	field.style.background=errorcolor;
    field_main=field;
	setInterval("temp()",500);
}

function temp(field)
{
var okcolor="#ffffff";
field_main.style.background=okcolor;
}

function validate(field,form)
{
	
	try
	{
	valiclass=field.getAttribute("valiclass");
	valimessage=field.getAttribute("valimessage");
	
	if(valiclass=="required")
	{
	
	req=field.getAttribute("req");
	
	if(field.value=="")
	{
	alert(valimessage);do_blink(field);return false;
	}
	}
	
	else if(valiclass=="email")
	{
		pattern='^[a-zA-Z0-9]+[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+[a-zA-Z0-9]$';
		if(!field.value.match(pattern))
		{
		alert(valimessage);do_blink(field);return false;
		}
	}
	else if(valiclass=="checkbox")
	{
		if(field.value=="")
		{
			alert(valimessage);return false;
		}
	
	}
	else if(valiclass=="number")
	{
		
	if((field.value.length<1)||isNaN(field.value))
	{
	alert(valimessage);do_blink(field);return false;
	}
		
	}
	else if(valiclass=="creditcard")
	{
	pattern="[0-9]{16}$";
	if((field.value.length!=16) || (!field.value.match(pattern)))
	{
	alert(valimessage);do_blink(field);return false;
	}
	
	}
	else if(valiclass=="PIN")
	{
	pattern="[0-9]{13}$";
	if((field.value.length!=13) || (!field.value.match(pattern)))
	{
	alert(valimessage);do_blink(field);return false;
	}
	
	}
	else if(valiclass=="zip")
	{
	pattern="[0-9]{5}$";
	//if(!field.value.match(pattern))
	if((field.value.length!=5) || (!field.value.match(pattern)))
	{
		alert(valimessage);do_blink(field);return false;
	}
	
	}
	
	else if(valiclass=="code")
	{
	pattern="[0-9]{3}$";
	if((field.value.length!=3) || (!field.value.match(pattern)))
	{
	alert(valimessage);do_blink(field);return false;
	}
	
	}
	else if(valiclass == "cpass")
	{	
		if(form.newpassword.value != form.cpassword.value)
			{
				alert(valimessage);do_blink(form.cpassword);return false;
			}
	}
	else if(valiclass == "imgsec")
	{
		if(form.imgsec.value != form.cimgsec.value)
			{
				alert(valimessage);do_blink(form.cimgsec);return false;
			}
	}
	
	else if(valiclass=="select")
	{
	if(field.options[field.selectedIndex].text.toLowerCase()=="select")
	{
	alert(valimessage);
	field.focus();
	return false;
	}
	}
	
	else if(valiclass=="date")
	{
	pattern="[0-9]{4}\\-[1-9]{1,2}\\-[1-9]{1,2}$";
	if(!field.value.match(pattern))
	{
	alert(valimessage);do_blink(field);return false;
	}
}
else if(valiclass=="integer")
{
	$bool=field.value.match("^[0-9]{1,8}$");
	
if((!$bool)||isNaN(field.value)||(field.value.indexOf(".")!=-1))
{
alert(valimessage);do_blink(field);return false;
}
}
else if(valiclass=="picture")
{
	alert('hi');
if(field.value.length<1)
return true;
values=field.value.toLowerCase();
if(!ends_with(values,".jpg"))
			  {
alert(values+" is not a valid jpg file");do_blink(field);return false;
}

}
return true;
}
catch(ex)
{
alert(ex.message);
return true;
}
}

function call_validate(form,from,to)
{
for(counter=from;counter<to;counter++)
{
bool=validate(form[counter]);
if(!bool)
{
return false;
break;
}
}
form.submit();
}

function call_validate_ajax(form,from,to)
{
for(counter=from;counter<to;counter++)
{
bool=validate(form[counter],form);
if(!bool)
{
return false;
break;
}
}
//return true;
form.submit();
}


/////////////////////
function getIndex(what,form) {
    for (var i=0;i<form.length;i++)
        if (what == form[i])
            return i;
    return -1;
}
////////////////////////////////////

function ends_with(hay,neddle)
{
hay=hay.replace(/^\s*|\s*$/g,"");
neddle_length=neddle.length;
hay_length=hay.length;
hay_part=hay.substring((hay_length-neddle_length),hay_length);
return (hay_part==neddle)
}


function  enable_form(form,bools)
{
	
for(counter=0;counter<form.length;counter++)
{
form[counter].disabled=!bools;	
}
}

function loading(bool)
{
try
{
comp=document.getElementById("loading");
if(bool)
{
comp.style.visibility="visible";
}
else
{
comp.style.visibility="hidden";
}
}
catch(d)
{
alert(d.message);	
}
}

function validate_range()
{
//alert(validate_range.arguments.length);	
for(counter=0;counter<validate_range.arguments.length;counter++)
{
bool=validate(validate_range.arguments[counter]);
if(!bool)
{
return false;
break;
}
}
validate_range.arguments[0].form.submit();
return true;
}

function delete_price(id,query)
{
if(confirm("Are you sure you want to delete"))
{
location.replace("delete_price.php?delete_id="+id+"&"+query);	
}
return false;
}



function delete_period(id,query)
{
if(confirm("Are you sure you want to delete"))
{
location.replace("delete_period.php?delete_id="+id+"&"+query);	
}
return false;
}


function delete_product(id,query)
{
if(confirm("Are you sure you want to delete"))
{
location.replace("delete_product.php?id="+id+"&"+query);	
}
return false;	
}


function delete_image(id,query)
{
if(confirm("Are you sure you want to delete"))
{
location.replace("delete_image.php?id="+id+"&"+query);	
}
return false;	
}


function delete_attribute(id,query)
{
if(confirm("Are you sure you want to delete"))
{
location.replace("delete_attribute.php?pops="+id+"&"+query);	
}
return false;	
	
	
}
function manage_payment(div)
{
	divdebit_card.style.visibility="hidden";
	divcheque.style.visibility="hidden";
	divmoney_order.style.visibility="hidden";
	div.style.visibility="visible";
}


function delete_confirm_sales(delte_where,delete_what,id,return_where,date1,date2)
{
	alert("Sales once deleted are not recoverable");
bool=confirm("Are you sure you want to delete " + delete_what+" ?");
if(bool)
{
	
location.replace("delete_sales.php?delete_where="+delte_where+"&id="+id+"&return_where="+return_where+"&datefrom="+date1+"&dateto="+date2);
//alert("delete.php?delete_where="+delte_where+"&id="+id+"&return_where="+return_where+"&"+extra);
}
else
{
return false;	
}
}
function delete_client(delte_where,delete_what,id,return_where,date1,date2)
{
	alert("Sales once deleted are not recoverable");
bool=confirm("Are you sure you want to delete " + delete_what+" ?");
if(bool)
{
	
location.replace("delete.php?delete_where="+delte_where+"&id="+id+"&return_where="+return_where+"&datefrom="+date1+"&dateto="+date2);
//alert("delete.php?delete_where="+delte_where+"&id="+id+"&return_where="+return_where+"&"+extra);
}
else
{
return false;	
}
}
function delete_confirm(id)
{
bool=confirm("do you want to delete the client");
if(bool)
{
href="delete.php?id="+id;
location.replace(href);
}
else
{
return;
}
}