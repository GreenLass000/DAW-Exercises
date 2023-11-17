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

<!--stackedit_data:
eyJoaXN0b3J5IjpbODg1NzQ1ODczLC0xODIyNjQ3NjYzLC0yMD
g4NzQ2NjEyLDczMDk5ODExNl19
-->