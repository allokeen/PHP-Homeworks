# 02 SUPERGLOBALS


## $\_GET

Set directly in URL. Example:
```
index.php?x=1&y=2
```
Will set:
```
$_GET['x'] == 1
$_GET['y'] == 2
```

## $\_POST

HTTP form data with POST method. Example:
```
<form method="post">
    <input type="text" name="foo">
    <input type="submit" value="Change">
</form>
```
After form is submitted value chan be obtained from:
```
$_POST['foo']
```

## $\_SESSION

Values stay on server side and are available between multiple requests
```
$_SESSION['key'] = 12;
```
Remember to start session before first use:
```
session_start();
```

## $\_COOKIE

Values stored on client side - will be visible in next request.
To set cookie use:
```
setcookie('key', 'value');
```
To read value:
```
$_COOKIE['key']
```
