// JavaScript Document

function showView()
{
//	alert("View");
	var viewdiv=document.getElementById('viewdiv');
	var newdiv=document.getElementById('newdiv');
    var eddiv=document.getElementById('eddiv');
    var spmsg=document.getElementById('opmsg');

	viewdiv.style.visibility='visible';
	newdiv.style.visibility='hidden';
	eddiv.style.visibility='hidden'; 
	spmsg.style.visibility='hidden'; 
}
function showNew()
{
//	alert("New");
	var viewdiv=document.getElementById('viewdiv');
	var newdiv=document.getElementById('newdiv');
    var eddiv=document.getElementById('eddiv');
    var spmsg=document.getElementById('opmsg');

	viewdiv.style.visibility='hidden';
	newdiv.style.visibility='visible';
	eddiv.style.visibility='hidden'; 
	spmsg.style.visibility='hidden'; 
}
function showEdit(edname,nm,amt, desc)
{
	var viewdiv=document.getElementById('viewdiv');
	var newdiv=document.getElementById('newdiv');
    var eddiv=document.getElementById('eddiv');
    var spmsg=document.getElementById('opmsg');
	var slist=document.getElementById('clist');
	var snm=document.getElementById('new_name');
	var samt=document.getElementById('new_amount');
	var sdesc=document.getElementById('new_desc');
	

	viewdiv.style.visibility='hidden';
	newdiv.style.visibility='hidden';
	eddiv.style.visibility='visible';
	spmsg.style.visibility='hidden';  
	slist.selectedIndex=edname;
	snm.value=nm;
	samt.value=amt;
	sdesc.value=desc;
	
}

function cofirmDel(msg)
{
	var del;
	del=confirm(msg);
	if(del)
		return true;
	else
		return false;
}

function validAddForm()
{

	var sname=document.getElementById('name');
	var samount=document.getElementById('amount');
	
	if (sname.value=="" && samount.value=="")
	{
		alert ("Enter package name and price");
		sname.focus();
		return false;

	}
	
	if (sname.value=="")
	{
		alert ("Enter package name");
		sname.focus();
		return false;

	}
	if (samount.value=="")
	{
		alert ("Enter package price");
		samount.focus();
		return false;

	}
	
	else
		return true;

}
function validUpdateForm()
{
	var sname=document.getElementById('new_name');
	if  (sname.value=="")
	{
		alert ("Enter new name");
		sname.focus();
		return false;
	}
	else
		return true;
		
}
function validPassword(passform)
{
	if(passform.pass1.value=="")
	{
		alert("Enter new password");
		passform.pass1.focus();
		return false;
	}
	if(passform.pass1.value!=passform.pass2.value)
	{
		alert("Passwords donot match");
		passform.pass2.focus();
		return false;
	}
	return true;
}

function gotoPage(pagenumber)
{
	document.getElementById('pagenumber').value=pagenumber;
	document.getElementById('exporttoexcel').value=0
	document.forms[0].submit();
}
function checkTotal(total_pages)
{

	var lp1=document.getElementById('xpg1');
	var lp2=document.getElementById('xpg2');
	if(lp1.value=="")
	{
		alert("please enter page range");
		lp1.focus();
		return false;
	}
	if(lp2.value=="")
	{
		alert("please enter page range");
		lp2.focus();
		return false;
	}
	if(parseInt(lp2.value)<parseInt(lp1.value))
	{
		alert("Upper limit should be more than lower limit")
		lp2.focus();
		return false;
	}
	if((parseInt(lp2.value)-parseInt(lp1.value)+1)>500)
	{
		alert("500 Pages is the maximum download limit");
		lp2.focus();
		return false;
	}
	if(parseInt(lp2.value)>parseInt(total_pages))
	{
		alert("Upper limit is not in range");
		lp2.focus();
		return false;
	}
		document.getElementById('exporttoexcel').value=1
		document.forms[0].submit();
}


