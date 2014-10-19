<SCRIPT LANGUAGE="javascript">
 
var server    = window.location.hostname;
var lastmod   = document.lastModified;   
var referrer  = document.referrer;   
  
var browser   = navigator.appName;
var os        = navigator.platform;
var useragent = navigator.userAgent;
 
var today     = new Date();
var r         = Math.floor ( Math.random() * 10000000 );
 
document.write("Server: "+server+" <br>");
document.write("This page last modified: "+lastmod+" <br>");
document.write("Referring page: <a href="+referrer+">"+referrer+"</a> <p>");
  
document.write("Browser: "+browser+" <br>");
document.write("OS: "+os+" <br>");
document.write("User agent string: "+useragent+" <p>");
 
document.write("Date: "+today.toString()+" <br>");
document.write("Random number from 0 to 10,000,000: "+r+" <p>");
 
</SCRIPT>
