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
          <p class="navbar-brand">TechNEWS</p>
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
                <?php
                foreach($news as $article)
                {
                ?>
	 			<! -- Blog Post -->
		 		<h3 class="ctitle"><?php echo $article['titre']; ?></h3>
                    <?php
                        if ($admin != null)
                        {
                    ?>
                            <span style="float:right;">
                            <form role="form" action="index.php" method="post">
                                <button type="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                                <input type="hidden" name="action" value="supprimer"/>
                                <input type="hidden" name="idNews" value="<?php echo $article['id']?>"/>
                            </form>
                            </span>
                            <span style="float:right;">
                            <form role="form" action="index.php" method="post">
                                <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </button>
                                <input type="hidden" name="action" value="goToEditer"/>
                                <input type="hidden" name="idNews" value="<?php echo $article['id']?>"/>
                            </form>
                            </span>
                    <?php
                        }
                    ?>
		 		<p><csmall>Publié le : <?php echo $article['date_creation_fr']; ?></csmall> | <csmall2>Par: <?php echo $article['auteur']; ?></csmall2></p>
		 		<p><?php echo nl2br(bbreplace::replace(substr($article['contenu'],0,700)))." ..."; ?></p>
                <form role="form" action="index.php" method="post">
                    <button type="submit" class="btn btn-theme btn-sm">
                        Lire la suite  <span class="glyphicon glyphicon-share-alt"></span>
                    </button>
                    <input type="hidden" name="action" value="lire"/>
                    <input type="hidden" name="idNews" value="<?php echo $article['id']?>"/>
                </form>
                <div class="spacing"></div>
		 		<div class="hline"></div>
		 		<div class="spacing"></div>
                    <?php
                }
                ?>

                <! -- Pagination -->
                <ul class="pagination">
                    <?php
                    for ($i = 1; $i <=$nbPages; $i++)
                    {
                        ?>
                            <li><a href="/index.php?numPage=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php
                    }
                    ?>
                </ul>
			</div><! --/col-lg-8 -->
	 		
	 		
	 		<! -- SIDEBAR -->
	 		<div class="col-lg-4">
                <div class="hline"></div>
                <h6>Vos commentaires</h6>
                <p><span class="glyphicon glyphicon-comment"></span>
                    <?php
                        echo $userNbComm;
                    ?>
                </p>

                <h6>Nombre total de commentaires</h6>
                <p><span class="glyphicon glyphicon-comment"></span>
                    <?php
                        echo $nbComm;
                    ?>
                </p>

                <! -- barre de recherche -->
		 		<h4>Rechercher</h4>
		 		<div class="hline"></div>
                <p>
                <form role="form" action="index.php" method="post">
                    <div class="form-group">
                        <div class="form-group">
                            <input name="rechercheDate" type="text" class="form-control" placeholder="2017-01-08">
                        </div>
                        <input type="hidden" name="action" value="rechercherDate">
                        <button type="commit" class="btn btn-theme">Rechercher par date</button>
                    </div>

                </form>
                <form role="form" action="index.php" method="post">

                <div class="form-group">
                    <div class="form-group">
                        <input name="rechercheMots" type="text" class="form-control" placeholder="Rechercher du texte">
                    </div>
                    <input type="hidden" name="action" value="rechercherMots">
                    <button type="commit" class="btn btn-theme">Rechercher des mots</button>
                </div>
                </form>
                </p>
		 		<div class="spacing"></div>

                <! --formulaire de connexion -->
                <?php
                if ($admin == null)
                {
                    ?>
		 		<h4>Se connecter</h4>
		 		<div class="hline"></div>
                <p>
				<form role="form" action="index.php" method="post">
					<div class="form-group">
						<label>Nom utilisateur</label>
						<input type="text" class="form-control" id="exampleInputEmail1" name="txtPseudo">
					</div>
					<div class="form-group">
						<label>Mot de passe</label>
						<input type="password" class="form-control" id="exampleInputEmail1" name="txtPasswd">
					</div>
					<input type="hidden" name="action" value="connexion"/>
					<button type="submit" class="btn btn-theme">Connexion</button>
				</form>
                </p>
                <?php
                    }
                    else
                    {
                ?>
                    <! -- message de bienvenue -->
                    <h4>Bonjour</h4>
                    <div class="hline"></div>
                <?php
                        echo "<p>"."Vous êtes connecté en tant que "."<b>".$admin->getLogin()."</b>"."<br>"."</p>";
                ?>
                    <span style="float:left;">
                    <form role="form" action="index.php" method="post">
                        <button type="submit" class="btn btn-theme">
                            <span class="glyphicon glyphicon-pencil"></span> Ecrire Article
                        </button>
                        <input type="hidden" name="action" value="goToPublier"/>
                    </form>
                    </span>
                    <span style="float:right;">
                    <form role="form" action="index.php"" method="post">
                        <button type="submit" class="btn btn-theme">
                            <span class="glyphicon glyphicon-off"></span> Deconnexion
                        </button>
                        <input type="hidden" name="action" value="deconnexion"/>
                    </form>
                    </span>
                <?php
                    }
                ?>
		 		<div class="spacing"></div>
                <br>
	 	</div><! --/row -->
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
