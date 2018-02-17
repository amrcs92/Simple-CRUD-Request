Simple CRUD Request:
--------------------
Simple CRUD system application with login/register using laravel auth library
type of users role: 2 (Admin, User(Employee))
user sent request to admin
admin accept/reject the request came from the users

Project installation:
---------------------

First, create new env (copy the env-example file):

with a name of the database you prefer, here I called it simple-task

give root to username as a local server & leave the password blank

if you want to use migrate command: php artisan migrate you will insert some records into tables prefer to use this step below:

import the SQL file (request_task.sql) in root project if you want to see the project working
make sure on creating the database make collation utf8mb4_unicode_ci


Additional steps (optional): for local server ex: Xampp Server:
----------------------------------------------------------------

-Create Virtual host:

- Open Xampp folder >> apache folder >> conf folder >> extra folder  then open httpd-vhosts.conf file with notepad or any editor, and add this module to the last file:
   <VirtualHost *:80>
       DocumentRoot "C:/xampp/htdocs/project-name/public"
       ServerName domain-name.whatever-you-prefer
   </VirtualHost>

- For windows user open C:/windows/system32/drivers/etc

   - then open notepad run as administrator (because you will not be able to edit this file without administrator permission)

   - then open the hosts file with notepad you've opened

   - make sure that 127.0.0.1  localhost to uncomment it then write the name of the domain
     ex: 127.0.0.1   laravel-project.com
