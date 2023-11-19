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
Hay que especificar la ruta del certificado
```
SSLCertificateFile      /etc/apache2/certificados/certificate.crt     
SSLCertificateKeyFile   /etc/apache2/certificados/clave.key
```

El archivo quedaria de la siguiente forma
```
<IfModule mod_ssl.c>
        <VirtualHost www.a01.com:443>
                ServerName a01.com
                ServerAlias www.a01.com
                ServerAdmin webmaster@localhost   

                DocumentRoot /usr/share/phpmyadmin

                # Available loglevels: trace8, ..., trace1, debug, info, notice, warn,
                # error, crit, alert, emerg.
                # It is also possible to configure the loglevel for particular
                # modules, e.g.
                #LogLevel info ssl:warn

                ErrorLog ${APACHE_LOG_DIR}/error-a01https.log
                CustomLog ${APACHE_LOG_DIR}/access-a01https.log combined

                # For most configuration files from conf-available/, which are
                # enabled or disabled at a global level, it is possible to
                # include a line for only one particular virtual host. For example the
                # following line enables the CGI configuration for this host only
                # after it has been globally disabled with "a2disconf".
                #Include conf-available/serve-cgi-bin.conf

                #   SSL Engine Switch:
                #   Enable/Disable SSL for this virtual host.
                SSLEngine on

                #   A self-signed (snakeoil) certificate can be created by installing
                #   the ssl-cert package. See
                #   /usr/share/doc/apache2/README.Debian.gz for more info.
                #   If both key and certificate are stored in the same file, only the
                #   SSLCertificateFile directive is needed.
                SSLCertificateFile      /etc/apache2/certificados/certificate.crt
                SSLCertificateKeyFile   /etc/apache2/certificados/clave.key

                #   Server Certificate Chain:
                #   Point SSLCertificateChainFile at a file containing the
                #   concatenation of PEM encoded CA certificates which form the
                #   certificate chain for the server certificate. Alternatively
                #   the referenced file can be the same as SSLCertificateFile
                #   when the CA certificates are directly appended to the server
                #   certificate for convinience.
                #SSLCertificateChainFile /etc/apache2/ssl.crt/server-ca.crt

                #   Certificate Authority (CA):
                #   Set the CA certificate verification path where to find CA
                #   certificates for client authentication or alternatively one
                #   huge file containing all of them (file must be PEM encoded)
                #   Note: Inside SSLCACertificatePath you need hash symlinks
                #                to point to the certificate files. Use the provided
                #                Makefile to update the hash symlinks after changes.
                #SSLCACertificatePath /etc/ssl/certs/
                #SSLCACertificateFile /etc/apache2/ssl.crt/ca-bundle.crt

                #   Certificate Revocation Lists (CRL):
                #   Set the CA revocation path where to find CA CRLs for client
                #   authentication or alternatively one huge file containing all
                #   of them (file must be PEM encoded)
                #   Note: Inside SSLCARevocationPath you need hash symlinks
                #                to point to the certificate files. Use the provided
                #                Makefile to update the hash symlinks after changes.
                #SSLCARevocationPath /etc/apache2/ssl.crl/
                #SSLCARevocationFile /etc/apache2/ssl.crl/ca-bundle.crl

                #   Client Authentication (Type):
                #   Client certificate verification type and depth.  Types are
                #   none, optional, require and optional_no_ca.  Depth is a
                #   number which specifies how deeply to verify the certificate
                #   issuer chain before deciding the certificate is not valid.
                #SSLVerifyClient require
                #SSLVerifyDepth  10

                #   SSL Engine Options:
                #   Set various options for the SSL engine.
                #   o FakeBasicAuth:
                #        Translate the client X.509 into a Basic Authorisation.  This means that
                #        the standard Auth/DBMAuth methods can be used for access control.  The
                #        user name is the `one line' version of the client's X.509 certificate.
                #        Note that no password is obtained from the user. Every entry in the user
                #        file needs this password: `xxj31ZMTZzkVA'.
                #   o ExportCertData:
                #        This exports two additional environment variables: SSL_CLIENT_CERT and
                #        SSL_SERVER_CERT. These contain the PEM-encoded certificates of the
                #        server (always existing) and the client (only existing when client
                #        authentication is used). This can be used to import the certificates
                #        into CGI scripts.
                #   o StdEnvVars:
                #        This exports the standard SSL/TLS related `SSL_*' environment variables.
                #        Per default this exportation is switched off for performance reasons,
                #        because the extraction step is an expensive operation and is usually
                #        useless for serving static content. So one usually enables the
                #        exportation for CGI and SSI requests only.
                #   o OptRenegotiate:
                #        This enables optimized SSL connection renegotiation handling when SSL
                #        directives are used in per-directory context.
                #SSLOptions +FakeBasicAuth +ExportCertData +StrictRequire
                <FilesMatch "\.(cgi|shtml|phtml|php)$">
                                SSLOptions +StdEnvVars
                </FilesMatch>
                <Directory /usr/lib/cgi-bin>
                                SSLOptions +StdEnvVars
                </Directory>

                #   SSL Protocol Adjustments:
                #   The safe and default but still SSL/TLS standard compliant shutdown
                #   approach is that mod_ssl sends the close notify alert but doesn't wait for
                #   the close notify alert from client. When you need a different shutdown
                #   approach you can use one of the following variables:
                #   o ssl-unclean-shutdown:
                #        This forces an unclean shutdown when the connection is closed, i.e. no
                #        SSL close notify alert is send or allowed to received.  This violates
                #        the SSL/TLS standard but is needed for some brain-dead browsers. Use
                #        this when you receive I/O errors because of the standard approach where
                #        mod_ssl sends the close notify alert.
                #   o ssl-accurate-shutdown:
                #        This forces an accurate shutdown when the connection is closed, i.e. a
                #        SSL close notify alert is send and mod_ssl waits for the close notify
                #        alert of the client. This is 100% SSL/TLS standard compliant, but in
                #        practice often causes hanging connections with brain-dead browsers. Use
                #        this only for browsers where you know that their SSL implementation
                #        works correctly.
                #   Notice: Most problems of broken clients are also related to the HTTP
                #   keep-alive facility, so you usually additionally want to disable
                #   keep-alive for those clients, too. Use variable "nokeepalive" for this.
                #   Similarly, one has to force some clients to use HTTP/1.0 to workaround
                #   their broken HTTP/1.1 implementation. Use variables "downgrade-1.0" and
                #   "force-response-1.0" for this.
                # BrowserMatch "MSIE [2-6]" \
                #               nokeepalive ssl-unclean-shutdown \
                #               downgrade-1.0 force-response-1.0

        </VirtualHost>
</IfModule>

# vim: syntax=apache ts=4 sw=4 sts=4 sr noet
```

Una vez todo configurado, hay que habilitar el sitio https
```bash
a2ensite [name]https.conf
```
Y se recarga `apache2`
```bash
systemctl reload apache2
```
Se comprueba con `lynx`
```bash
lynx https://[domain]
```

<!--stackedit_data:
eyJoaXN0b3J5IjpbNzU5NzI5MTksODk4MDE5MDc3LDI1NzgxNT
Y4NywtMTc4NzY1NTMwMiwxNzQ0NDIwNzA3LDE4MzY3OTQxNzIs
OTMwNjc3MjQ0LDU3NjA5MjMwMSwzNDUzNTk0NzcsLTE2MzU4OT
gwNjAsLTEzODIyNzc5OTEsODM5MDg0ODIzLDkzNjAxOTgxOF19

-->