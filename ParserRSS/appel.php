<html>
<body>
<?php
include_once ('Autoloader.php');
include ('ParserXml.php');
         
$parser = new ParserXml(dirname(__FILE__).'/rss.xml');
$parser ->parser();
 
?>
</body>
</html>
