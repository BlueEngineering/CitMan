<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeTitle			= "Citation Manager";
?>
<!DOCTYPE html>
<html lang="de">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title><?= $cakeTitle ?></title>
		
		<?= $this->Html->meta('icon') ?>
		
		<!-- Bootstrap -->
		<?= $this->Html->css('bootstrap.min.css') ?>
		<!-- CSS by jQuery UI -->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- jQuery UI framework -->
		<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<?= $this->Html->script('bootstrap.min.js') ?>
		<!--  -->
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<!-- navigation -->
		<nav class="nav navbar-inverse">
			<div class="container-fluid">
				<!-- brand and navigation for small display's -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"> </a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
					<ul class="nav navbar-nav">
					
						<!--li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li-->
						
						<!-- citation menu -->
						<li>
							<?=
								$this->Html->link( 'Neues Zitat', [
									'controller'	=> 'citations',
									'action'		=> 'create'
								] )
							?>
						</li>
						<!-- /citation menu -->
						
						<!-- overview menu -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Listen <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li>
									<?=
										$this->Html->link( 'Autoren', [
											'controller'	=> 'authors',
											'action'		=> 'index'
										] )
									?>
								</li>
								<li>
									<?=
										$this->Html->link( 'Werke', [
											'controller'	=> 'works',
											'action'		=> 'index'
										] )
									?>
								</li>
								<!--li>
									<?=
										$this->Html->link( 'Tags', [
											'controller'	=> 'tags',
											'action'		=> 'index'
										] )
									?>
								</li-->
								<li>
									<?=
										$this->Html->link( 'Zitate', [
											'controller'	=> 'citations',
											'action'		=> 'index'
										] )
									?>
								</li>
								<!--li class="divider" role="separator"></li>
								<li>
									<?=
										$this->Html->link( 'Medientypen (nur Admins)', [
											'controller'	=> 'media',
											'action'		=> 'index'
										] )
									?>
								</li-->
							</ul>
						</li>
						<!-- /overview menu -->
						
						<!-- authors menu -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Eintragen <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li>
									<?=
										$this->Html->link( 'Neue*r Autor*in', [
											'controller'	=> 'authors',
											'action'		=> 'create'
										] )
									?>
								</li>
								<li>
									<?=
										$this->Html->link( 'Neues Werk anlegen', [
											'controller'	=> 'works',
											'action'		=> 'create'
										] )
									?>
								</li>
								<!--li class="divider" role="separator"></li>
								<li>
									<?=
										$this->Html->link( 'Neuen Medientyp anlegen (nur Admins)', [
											'controller'	=> 'media',
											'action'		=> 'create'
										] )
									?>
								</li-->
							</ul>
						</li>
						<!-- /authors menu -->
						
						<!-- export menu -->
						<!--li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Exportfunktionen <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">CSV Export</a></li>
								<li><a href="#">Bibtex Export</a></li>
							</ul>
						</li-->
						<!-- /export menu -->
						
						<!-- userspecific -->
						<!-- /userspecific -->
						
					</ul>
				</div>
				
				<!--div class="navbar-header">
					Suchfeld
				</div-->
				
			</div>
		</nav>
		<!-- /navigation -->
		
		<div class="container">
			
			<!-- content -->
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<?= $this->Flash->render() ?>
					<?= $this->fetch('content') ?>
				</div>
			</div>
			<!-- /content -->
			
			<!-- footer -->
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p>&nbsp;</p>
				</div>
			</div>
			<!-- /footer -->
			
		</div>
	</body>
</html>