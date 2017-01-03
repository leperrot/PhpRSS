<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/side/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="bootstrap/side/css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="index.php">
                    RSS
                </a>
            </li>
            <li>
                <a href="index.php">Dernières News</a>
            </li>
            <li>
                <a href="#">Nouvelles technologies</a>
            </li>
            <li>
                <a href="#">Informatique</a>
            </li>
            <li>
                <a href="#">Jeux vidéos</a>
            </li>
            <li>
                <a href="#">Culture</a>
            </li>
            <li>
                <a href="#">Science</a>
            </li>
            <li>
                <a href="#">Monde</a>
            </li>
            <li>
                <a href="index.php?action=admin">Accès admin</a>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <h3>Nouveaux fils</h3>
            <div class="row">
                <ul class="list-group">
                    <?php
                    if(isset($data)) {
                        foreach ($data as $news) {
                            echo "<li>
                                 <a href=". $news->getLien() . " >" . $news->getTitre() . "</a> 
                                 <span>".$news->getDescription()."</span>
                                 <span>".$news->getDate()."</span>
                                 </li>";
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
