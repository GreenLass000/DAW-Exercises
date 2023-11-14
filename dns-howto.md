# DNS

## Instalación 

Lo primero que hay que hacer siempre es actualizar las dependencias

```bash
apt update
```

Instala dns `bind9` y programas extras `dnsutils`

```bash
apt install bind9 dnsutils
```

Para comprobar la sintaxis de los archivos de configuración de bind9

```bash
# Puedes especificar un archivo que quieras comprobar
named-checkconf [fichero]
# Si se pone vacío compruena named.conf junto a sus imports
named-checkconf
```

## Configuración

Configurar los forwarders para añadir la ip en el archivo `/etc/bind/named.conf.options`
Hay que añadir la línea `auth-nxdomain no`
```
options {
        directory "/var/cache/bind";

        // If there is a firewall between you and nameservers you want
        // to talk to, you may need to fix the firewall to allow multiple
        // ports to talk.  See http://www.kb.cert.org/vuls/id/800113

        // If your ISP provided one or more IP addresses for stable
        // nameservers, you probably want to use them as forwarders.
        // Uncomment the following block, and insert the addresses replacing
        // the all-0's placeholder.

        forwarders {
                127.0.1.1;
        //      1.1.1.1;
        //      8.8.8.8;
        };

        //========================================================================
        // If BIND logs error messages about the root key being expired,
        // you will need to update your keys.  See https://www.isc.org/bind-keys
        //========================================================================

        //dnssec-validation auto;

        auth-nxdomain no;
        listen-on-v6 { any; };
};
```
Añadir el dominio al resolv en `/etc/resolv.conf`
```
search [dominio]
domain [dominio]
nameserver 127.0.0.1
```

Configurar la zona directa en el archivo `/etc/bind/`

## DDNS

Para configurar un ddns hay que instalar el cliente de un servicio ddns

```bash
apt install ddclient
```
Una vez instalado hay que configurarlo siguiendo los pasos
![Seleccion de servicio ddns](https://cdn.discordapp.com/attachments/1173632725031338025/1173685119282860143/image.png?ex=6564da72&is=65526572&hm=0a28d9d1dbc15cd76e8a1260fbaebd81f06e1c861e4dd33351ff2d0d6c6218ba&)

<!--stackedit_data:
eyJoaXN0b3J5IjpbODU5MTc3NjQzLDEyNDE1MTQzMDgsLTEwMD
I1NDM1NjZdfQ==
-->