<html>
<body>
<?php
include_once ('Autoloader.php');
include ('ParserXml.php');
$parser = new ParserXml(dirname(__FILE__).'/rss.xml');
echo ("ok");
$parser ->parser();
 
?>
</body>
</html>
