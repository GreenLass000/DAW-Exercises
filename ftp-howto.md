# Acceso Remoto
Para crear un usuario
```bash
adduser invitado
```
Se responden las preguntas
```
Adding user `invitado' ...
Adding new group `invitado' (1001) ...
Adding new user `invitado' (1001) with group `invitado' ...
Creating home directory `/home/invitado' ...
Copying files from `/etc/skel' ...
New password: 
Retype new password: 
passwd: password updated successfully
Changing the user information for invitado
Enter the new value, or press ENTER for the default
        Full Name []: Marcos Navarro
        Room Number []: i0501
        Work Phone []: 
        Home Phone []: 
        Other []: 
Is the information correct? [Y/n] y
```
Para dar permisos de adminstrador al usuario
```bash
usermod -aG sudo invitado
```

Para crear un par de claves
```bash
ssh-keygen
```
Respondemos las preguntas
```
Generating public/private rsa key pair.
Enter file in which to save the key (/root/.ssh/id_rsa): 
Enter passphrase (empty for no passphrase): 
Enter same passphrase again: 
Your identification has been saved in /root/.ssh/id_rsa
Your public key has been saved in /root/.ssh/id_rsa.pub
The key fingerprint is:
SHA256:2LmbDRA5UCe4aUI0eadq3hbcNnZEU+K5ckxJ3ZNB4dg root@srv
The key's randomart image is:
+---[RSA 3072]----+
| .o..oo +o.o++   |
|  o.o..*o+.++    |
| . . =+.=.. E.   |
|  . =  B.o       |
|   = .+.S        |
|  o o =+..       |
| o . + oo        |
|  . o    =       |
|   .    o .      |
+----[SHA256]-----+
```
Enviamos las claves al servidor
```bash
ssh-copy-id [usuario]@[ip]
```

## FTP
Instalar ftp en el servidor
```bash
apt install vsftpd
```
Se inicia y se activa el servicio de ftp
```bash
systemctl start vsftpd
```
```bash
systemctl enable vsftpd
```
Se crea una copia de seguridad del archivo de configuracion de ftp
```bash
cp /etc/vsftpd.conf /etc/vsftpd.conf.old
```
Al editar el archivo de configuracion, hay que comprobar las siguientes lineas
```
anonymous_enable=NO
local_enable=YES
write_enable=YES
chroot_local_user=YES
```
Despues de hacer los cambios hay que reiniciar el servicio de ftp
```bash
systemctl restart vsftpd.service
```
En el cliente hay que descargar ftp
```bash
apt install ftp
```
Nos conectamos al servidor desde ftp
```bash

```
<!--stackedit_data:
eyJoaXN0b3J5IjpbLTYxOTEzMjk1NiwxNzIyOTI4NDcsODg1Nz
Q1ODczLC0xODIyNjQ3NjYzLC0yMDg4NzQ2NjEyLDczMDk5ODEx
Nl19
-->