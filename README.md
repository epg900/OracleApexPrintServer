# OracleApexPrintServer
this is a brief php project that give you an idea to start your own print server

1.enter your print server address in oracle apex print server setting:
enter the admin profile of apex (localhost:8080/apex/apex_admin)
then enter the Manage Instance >  Instance Settings 
in the report printing tab in the print server combo box select External(Apache FOP)
then set Print Server Host Address to your PHP server address like localhost
set Port to 80 and set Print Server Script to your PHP script like /print.php
