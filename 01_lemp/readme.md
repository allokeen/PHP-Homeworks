# 01 LEMP

Some handy bash commends:

Create empty file with some content

```
echo 'xxx' > file.txt
```
Calculate MD5 sum

```
md5sum file.txt 
```

Create empty file

```
touch md5.php
```

Run normal PHP file with parameter

```
php md5.php file.txt 
```

Check where given binary is located

```
whereis php
```

Add line at the beginning of file (here **#!/usr/bin/php** is added) 

```
sed -i '1i #!/usr/bin/php' md5.php
```

Make file executable

```
chmod +x md5.php
```

Rename file :)

```
mv md5.php md5
```

Add current directory to system PATH (binary can be executed without **./** e.g.: **md5** instead of **./md5** )

```
PATH=$PATH:$PWD
```

Check background service status
```
sudo service nginx status
sudo service php7.2-fpm status 
sudo service mysql status
sudo service redis status

# You can also use: stop, start or restart with most services
```
