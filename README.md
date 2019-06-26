T

his is a brief php project that give you an idea to start your own print server


when oracle apex report classic report send print to print server it send multy POST parameter
 to it.
 
we need 2 parameter 

$_POST['XML'] for sended data with report

and

$_POST['_xf'] for report type 



enter your print server address in oracle apex print server setting:


enter the admin profile of apex (localhost:8080/apex/apex_admin)

then enter the Manage Instance >  Instance Settings 

in the report printing tab in the print server combo box select External(Apache FOP)

then set Print Server Host Address to your PHP server address like localhost
set Port to 80 
and set Print Server Script to your PHP script like /print.php


then enter the shell (in Windows like cmd / in Linux like bash)

enter the sqlplus as sysdba:

sqlplus /nolog

connect / as sysdba


and run the print.sql file or run pl/sql command in that file:

@print.sql


then set your report print to your desired format like pdf or html 
and send print in classic report with click Print link.
