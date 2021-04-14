
				function signout()
				{
					alert("Confirm logout ?");
					document.cookie ="admin=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
					window.location.replace("index.php");
				}
				function openNav() 
				{
					document.getElementById("mySidenav").style.width = "280px";
				}
				function closeNav()
				{
					document.getElementById("mySidenav").style.width = "0";
				}
				function openclose()
				{
				    if($("#mySidenav").width()=="0")
				    {
				        document.getElementById("mySidenav").style.width = "280px";
				    }
				    else
				    {
				        document.getElementById("mySidenav").style.width = "0";
				    }
				}
				if(getCookie("admin")!="admin"){
				   // window.location.href="index.php";
				}
				function getCookie(cname) {
				    var name = cname + "=";
				    var decodedCookie = decodeURIComponent(document.cookie);
				    var ca = decodedCookie.split(';');
				    for(var i = 0; i < ca.length; i++) {
					    var c = ca[i];
					    while (c.charAt(0) == ' ') {
					        c = c.substring(1);
					    }
				        if(c.indexOf(name) == 0) {
				        	return c.substring(name.length, c.length);
				        }
				    }
				    return null;
				}