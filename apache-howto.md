# Apache

Actualizar las dependencias
```bash
apt update
```
Para instalar únicamente apache
```bash
apt install apache2
```
Para instalar LAMP de forma segura
```bash
apt install apache2 mariadb-server
```
```bash
mysql_secure_installation
```
Estas son las respuestas a la instalacion securizada
```
NOTE: RUNNING ALL PARTS OF THIS SCRIPT IS RECOMMENDED FOR ALL MariaDB
      SERVERS IN PRODUCTION USE!  PLEASE READ EACH STEP CAREFULLY!

In order to log into MariaDB to secure it, we'll need the current
password for the root user. If you've just installed MariaDB, and
haven't set the root password yet, you should just press enter here.

Enter current password for root (enter for none): 
OK, successfully used password, moving on...

Setting the root password or using the unix_socket ensures that nobody
can log into the MariaDB root user without the proper authorisation.

You already have your root account protected, so you can safely answer 'n'.

Switch to unix_socket authentication [Y/n] 
Enabled successfully!
Reloading privilege tables..
 ... Success!


You already have your root account protected, so you can safely answer 'n'.

Change the root password? [Y/n] n
 ... skipping.

By default, a MariaDB installation has an anonymous user, allowing anyone
to log into MariaDB without having to have a user account created for
them.  This is intended only for testing, and to make the installation
go a bit smoother.  You should remove them before moving into a
production environment.

Remove anonymous users? [Y/n] 
 ... Success!

Normally, root should only be allowed to connect from 'localhost'.  This
ensures that someone cannot guess at the root password from the network.

Disallow root login remotely? [Y/n] n
 ... skipping.

By default, MariaDB comes with a database named 'test' that anyone can
access.  This is also intended only for testing, and should be removed
before moving into a production environment.

Remove test database and access to it? [Y/n] n
 ... skipping.

Reloading the privilege tables will ensure that all changes made so far
will take effect immediately.

Reload privilege tables now? [Y/n] 
 ... Success!

Cleaning up...

All done!  If you've completed all of the above steps, your MariaDB
installation should now be secure.

Thanks for using MariaDB!
``` 
Por último para instalar LAMP
```bash
apt install php libapache2-mod-php php-mysql phpmyadmin
```

Para poder utilizar sentencias SQL desde la terminal
```bash
mysql -u root -p
```
Para crear un usuario
```sql
CREATE USER 'admin'@'localhost' IDENTIFIED BY 'cl4ve2022';
```
```sql
GRANT ALL PRIVILEGES ON *.* TO 'admin'@'localhost' WITH GRANT OPTION;
```
```sql
FLUSH PRIVILEGES;
```

### VirtualHosts

Hacer una copia de `000-default.conf` para hacer tu propio VirtualHost
```bash
cp /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/[nombre].conf
```
Hay que editar el nuevo archivo creado
```
<VirtualHost [name]:80>
        # The ServerName directive sets the request scheme, hostname and port that
        # the server uses to identify itself. This is used when creating
        # redirection URLs. In the context of virtual hosts, the ServerName       
        # specifies what hostname must appear in the request's Host: header to    
        # match this virtual host. For the default virtual host (this file) this  
        # value is not decisive as it is used as a last resort host regardless.   
        # However, you must set it for any further virtual host explicitly.       

        ServerName [name]
        ServerAlias www.[name]
        ServerAdmin webmaster@localhost

        DocumentRoot /usr/share/phpmyadmin
        DirectoryIndex index.html

		#Si la ruta acaba en /phpmyadmin , redirige a www.a01.com
        <Location "/phpmyadmin">
                Redirect "/phpmyadmin" "http://www.a01.com"
        </Location>

        # Available loglevels: trace8, ..., trace1, debug, info, notice, warn,
        # error, crit, alert, emerg.
        # It is also possible to configure the loglevel for particular        
        # modules, e.g.
        #LogLevel info ssl:warn

        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined

        # For most configuration files from conf-available/, which are
        # enabled or disabled at a global level, it is possible to
        # include a line for only one particular virtual host. For example the
        # following line enables the CGI configuration for this host only
        # after it has been globally disabled with "a2disconf".
        #Include conf-available/serve-cgi-bin.conf
</VirtualHost>

# vim: syntax=apache ts=4 sw=4 sts=4 sr noet
```
Hay que habilitar el sitio para que funcione (no hay que poner la ruta absoluta, solo el nombre del archivo `.conf`)
```bash
a2ensite [name].conf
```
Por ultimo hay que recargar `apache2`
```bash
systemctl reload apache2
```
Y probar
```bash
lynx [name]
```
Se repiten los mismos pasos para todos los VirtualHost que quieras

### HTTPS

Actualizar las dependencias
```bash
apt update
```

Primero hay que habilitar el modulo ssl para que funcione todo
```bash
a2enmod ssl
```
Instalar openssh
```bash
apt install openssh-client
```
El siguiente paso es crear los certificados, los puedes crear en otra carpeta con `mkdir` para que esté mas organizado

Generar clave privada
```bash
openssl req -new -nodes -keyout clave.key -out request.csr
```
```
Generating a RSA private key
.........+++++
...............................+++++
writing new private key to 'clave.key'
-----
You are about to be asked to enter information that will be incorporated   
into your certificate request.
What you are about to enter is what is called a Distinguished Name or a DN.
There are quite a few fields but you can leave some blank
For some fields there will be a default value,
If you enter '.', the field will be left blank.
-----
Country Name (2 letter code) [AU]:ES
State or Province Name (full name) [Some-State]:Valladolid
Locality Name (eg, city) []:Valladolid
Organization Name (eg, company) [Internet Widgits Pty Ltd]:Empresa
Organizational Unit Name (eg, section) []:
Common Name (e.g. server FQDN or YOUR name) []: [FQDN]
Email Address []:

Please enter the following 'extra' attributes
to be sent with your certificate request     
A challenge password []:
An optional company name []:
```
Generar el certificado con la clave generada
```bash
openssl x509 -in request.csr -req -signkey clave.key -out certificate.crt -days 365
```

Una vez tienes el certificado generado, hay que hacer un VirtualHost para https
```bash
cp /etc/apache2/sites-available/default-ssl.conf /etc/apache2/sites-available/[name]https.conf
```

<!--stackedit_data:
eyJoaXN0b3J5IjpbMjU3ODE1Njg3LC0xNzg3NjU1MzAyLDE3ND
Q0MjA3MDcsMTgzNjc5NDE3Miw5MzA2NzcyNDQsNTc2MDkyMzAx
LDM0NTM1OTQ3NywtMTYzNTg5ODA2MCwtMTM4MjI3Nzk5MSw4Mz
kwODQ4MjMsOTM2MDE5ODE4XX0=
-->