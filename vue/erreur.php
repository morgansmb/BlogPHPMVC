<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title>Blog actualités</title>

    <!-- Bootstrap core CSS -->
    <link href="vue/assets/css/bootstrap.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="vue/assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="vue/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="vue/assets/js/modernizr.js"></script>
</head>

<body>

<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <p class="navbar-brand">TechNEWS</p>
        </div>
        <div class="navbar-collapse collapse navbar-right">
            <ul class="nav navbar-nav">
                <form role="form" action="index.php" method="post">
                    <input type="hidden" name="action" value="afficherNews"/>
                    <button type="submit" class="btn btn-theme">HOME</button>
                </form>
            </ul>
        </div>
    </div>
</div>


<!-- *****************************************************************************************************************
 BLOG CONTENT
 ***************************************************************************************************************** -->

<div class="container mtb">
    <div class="row">

        <! -- BLOG POSTS LIST -->
        <div class="col-lg-8">
            <h2>ERREUR</h2>
            <?php
                foreach($this->dataVueErreur as $erreur)
                {
                    echo "<h4>$erreur</h4>";
                }
            ?>
        </div><! --/col-lg-8 -->
    </div><! --/container -->


    <!-- *****************************************************************************************************************
     FOOTER
     ***************************************************************************************************************** -->
    <div id="footerwrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h4>SAMBARDIER Morgan</h4>
                    <div class="hline-w"></div>
                    <p>Etudiant 2nd année DUT Informatique</p>
                </div>
                <div class="col-lg-4">
                    <h4></h4>
                    <div class="hline"></div>
                    <p></p>
                </div>
                <div class="col-lg-4">
                    <h4>BILLY Nicolas</h4>
                    <div class="hline-w"></div>
                    <p>Etudiant 2nd année DUT Informatique</p>
                </div>
            </div><! --/row -->
        </div><! --/container -->
    </div><! --/footerwrap -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/retina-1.1.0.js"></script>
    <script src="assets/js/jquery.hoverdir.js"></script>
    <script src="assets/js/jquery.hoverex.min.js"></script>
    <script src="assets/js/jquery.prettyPhoto.js"></script>
    <script src="assets/js/jquery.isotope.min.js"></script>
    <script src="assets/js/custom.js"></script>


</body>
</html>
