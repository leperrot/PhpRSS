<html>
<body>
<?php
include ('Autoloader.php');
include ('ParserXml.php');

/*$data[]=ParseModel::getFlux();
foreach ($data as $flux){
    $f=new Flux($flux[0]['lienFlux']);
    var_dump($f);
    $parser = new ParserXml($f->getLien());
    $parser ->parser();
}
*/
$parser = new ParserXML(dirname(__FILE__).'/rss.xml');
$parser ->parser();

?>
</body>
</html>
