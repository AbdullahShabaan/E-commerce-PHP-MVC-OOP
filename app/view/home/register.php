<!DOCTYPE html>
<html>
<head>
	<title><?php echo $tit ; ?></title>
</head>
<body>
	<h1><?php echo $h1 ;?></h1>
    <form action ="postregister" method = "POST">
        <input type="text" name ="name">
        <input type="password" name = "pass">
        <input type="submit">
    </form>
</body>
</html>