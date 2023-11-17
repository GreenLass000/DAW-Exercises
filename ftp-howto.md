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

<!--stackedit_data:
eyJoaXN0b3J5IjpbNzY0OTYwODMzLC0xODIyNjQ3NjYzLC0yMD
g4NzQ2NjEyLDczMDk5ODExNl19
-->