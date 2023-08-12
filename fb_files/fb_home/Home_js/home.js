function blank_post_check()
{
	var post=document.posting_txt.post_txt.value;
	if(post=="")
	{
		return false;
	}
	return true;
}

function uploadFile(target) {
    document.getElementById("file-name").innerHTML = target.files[0].name;
}
		
function upload_open1()
{
	document.getElementById("status_logbox").style.display='block';
}

function upload_open2()
{
	document.getElementById("status_logbox2").style.display='block';
}
		
function upload_close1()
{
	document.getElementById("status_logbox").style.display='none';
}

function upload_close2()
{
	document.getElementById("status_logbox2").style.display='none';
}
				
function Img_check()
{
	var file = document.getElementById('img');
	var fileName = file.value;
	var ext = fileName.slice(fileName.length-4,fileName.length);
	if(fileName=="")
	{
		return false;
	}
	else
	{
		if(ext!=".jpg" && ext!=".JPG" && ext!=".png" && ext!=".PNG" && ext!=".gif" && ext!=".GIF" && ext!=".jpeg" && ext!=".JPEG")
		{
			document.getElementById("photo_erorr").style.display='block';
			document.getElementById("body").style.overflow="hidden";
			return false;
		}
	}
	document.getElementById("photo_erorr").style.display='none';
	document.getElementById("body").style.overflow="visible";
	return true;
}
function Comment_focus(postid)
{
	document.getElementById(postid).focus();
}

function Comment_open(postid)
{
	document.getElementById("komen"+postid).style.display='block';
	document.getElementById("bottom_comment_komentar"+postid).style.display='none';
	document.getElementById("bottom_comment_komentar2"+postid).style.display='block';
}

function Comment_close(postid)
{
	document.getElementById("komen"+postid).style.display='none';
	document.getElementById("bottom_comment_komentar"+postid).style.display='block';
	document.getElementById("bottom_comment_komentar2"+postid).style.display='none';
}

function hide_photo_erorr()
{
	document.getElementById("photo_erorr").style.display='none';
	document.getElementById("body").style.overflow="visible";
}

function post_name_underLine(pid)
{
	document.getElementById("uname"+pid).style.textDecoration = "underline";
}
function post_name_NounderLine(pid)
{
	document.getElementById("uname"+pid).style.textDecoration = "none"
}

function like_underLine(pid)
{
	document.getElementById("like"+pid).style.textDecoration = "underline";
}
function like_NounderLine(pid)
{
	document.getElementById("like"+pid).style.textDecoration = "none"
}

function unlike_underLine(pid)
{
	document.getElementById("unlike"+pid).style.textDecoration = "underline";
}
function unlike_NounderLine(pid)
{
	document.getElementById("unlike"+pid).style.textDecoration = "none"
}

function Comment_underLine(pid)
{
	document.getElementById("comment"+pid).style.textDecoration = "underline";
}
function Comment_NounderLine(pid)
{
	document.getElementById("comment"+pid).style.textDecoration = "none"
}

function Comment_name_underLine(cid)
{
	document.getElementById("cuname"+cid).style.textDecoration = "underline";
}
function Comment_name_NounderLine(cid)
{
	document.getElementById("cuname"+cid).style.textDecoration = "none"
}