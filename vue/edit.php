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
    <script type="text/javascript" src="vue/assets/js/insertTag.js"></script>
    <script src="vue/assets/js/modernizr.js"></script>
      <?php
        require("vue/assets/classesAffichage/bbreplace.php");
      ?>
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
          <a class="navbar-brand" href="#">TechNEWS</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
              <form role="form" action="index.php" method="post">
                  <input type="hidden" name="action" value="afficherNews"/>
                  <button type="submit" class="btn btn-theme">HOME</button>
              </form>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

	 
	<!-- *****************************************************************************************************************
	 BLOG CONTENT
	 ***************************************************************************************************************** -->

	 <div class="container mtb">
	 	<div class="row">
	 		<! -- BLOG POSTS LIST -->
	 		<div class="col-lg-8">
                <form role="form" action="index.php" method="post">
                    <div class="form-group">
                        <label>Titre</label>
                        <input type="text" class="form-control" name="txtTitre" value="<?php echo $article[0]['titre']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Contenu</label>
                        <p>
                            <button type="button" class="btn btn-default" onClick="insertTag(':', ')', 'txt');"><img src="vue/assets/img/smileys/content.gif"></button>
                            <button type="button" class="btn btn-default" onClick="insertTag(';', ')', 'txt');"><img src="vue/assets/img/smileys/complice.gif"></button>
                            <button type="button" class="btn btn-default" onClick="insertTag(':', 'D', 'txt');"><img src="vue/assets/img/smileys/joie.gif"></button>
                            <input type="button" value="gras" class="btn btn-default" onclick="insertTag('[g]', '[/g]', 'txt');" />
                            <input type="button" value="italique" class="btn btn-default" onclick="insertTag('[i]', '[/i]', 'txt');" />
                            <input type="button" value="souligné" class="btn btn-default" onclick="insertTag('[s]', '[/s]', 'txt');" />
                        </p>
                        <textarea id="txt" name="txtContenu" class="form-control" rows="30" cols="40"><?php echo $article[0]['contenu']; ?></textarea>                        </textarea>
                    </div>
                    <input type="hidden" name="idNews" value="<?php echo $article[0]['id']; ?>"/>
                    <input type="hidden" name="action" value="editer"/>
                    <button type="submit" class="btn btn-theme">Editer</button>
                </form>
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
