<html>
<body>
<?php
include ('Autoloader.php');
include ('ParserXml.php');

$pm=new ParseModel();
$data=$pm->getFlux();
foreach ($data as $flux){
    //var_dump($flux['Lien']);
    $f=new Flux($flux['Lien']);
    $parser = new ParserXml($f->getLien(),$pm);
    $parser ->parser();
}
/*
$parser = new ParserXML('http://www.laprovence.com/rss/elections-municipales.xml');
$parser ->parser();
*/
?>
</body>
</html>
