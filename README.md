Shopping Online v1.0 README File
-------------------------------

The complete documentation for functionality of ¡®Shopping Online¡¯ is written in User Manual section of the final report. *Important* In the section of library.php and Header.php, there needs some changes to be made. 

Header.php -> 
for line 37:    $con=mysqli_connect("localhost","root","CPSC471!","final_project");
change the directory of sql connection to your own database. root = ID password = CPSC471! 
project name = final_project for OUR database. 

library.php ->
	$CONNECTION_HOST = "localhost";
	$CONNECTION_USER = "root";
	$CONNECTION_PASSWORD = "CPSC471!";
	$CONNECTION_DATABASE = "final_project";

change this accordingly as well to your Database. 
 


