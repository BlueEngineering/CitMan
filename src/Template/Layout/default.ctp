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
					
					<?php
					/*
					if( $this->Auth->user() ) {
						echo '<div class="navbar-form navbar-left">I\'m in Babe!</div>';
					} else {
						echo $this->element( 'formTags' );
					}
					*/
					
					//echo $this->element( 'menu/formLogin' );
					?>
					
					<!--span class="glyphicon glyphicon-user"></span-->
					
					<ul class="nav navbar-nav navbar-left">
					
						<!--li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li-->
												
						<!-- authors menu -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<span class="glyphicon glyphicon-user"></span>
								Autoren
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li>
									<?=
										$this->Html->link(
											$this->Html->tag(
												'span',
												'',
												[
													'class'			=> 'glyphicon glyphicon-list'
												]
											) . ' Übersicht',
											[
												'controller'	=> 'authors',
												'action'		=> 'index'
											],
											[
												'class'			=> '',
												'escape'		=> false
											]
										)
									?>
								</li>
								
								<li class="divider" role="separator"></li>
								
								<li>
									<?=
										$this->Html->link(
											$this->Html->tag(
												'span',
												'',
												[
													'class'			=> 'glyphicon glyphicon-pencil'
												]
											) . 'AutorIn anlegen',
											[
												'controller'	=> 'authors',
												'action'		=> 'create'
											],
											[
												'class'			=> '',
												'escape'		=> false
											]
										)
									?>
								</li>
							</ul>
						</li>
						<!-- /.authors menu -->
						
						<!-- works menu -->
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<span class="glyphicon glyphicon-book"></span>
									Werke
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li>
										<?=
											$this->Html->link(
												$this->Html->tag(
													'span',
													'',
													[
														'class'			=> 'glyphicon glyphicon-list'
													]
												) . ' Übersicht',
												[
													'controller'	=> 'works',
													'action'		=> 'index'
												],
												[
													'class'			=> '',
													'escape'		=> false
												]
											)
										?>
									</li>
									
									<li class="divider" role="separator"></li>
									
									<li>
										<?=
											$this->Html->link(
												$this->Html->tag(
													'span',
													'',
													[
														'class'			=> 'glyphicon glyphicon-pencil'
													]
												) . ' Werk anlegen',
												[
													'controller'	=> 'works',
													'action'		=> 'create'
												],
												[
													'class'			=> '',
													'escape'		=> false
												]
											)
										?>
									</li>
								</ul>
							</li>
						<!-- /.works menu -->
						
						<!-- citations menu -->
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<span class="glyphicon glyphicon-comment"></span>
									Zitate
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li>
										<?=
											$this->Html->link(
												$this->Html->tag(
													'span',
													'',
													[
														'class'			=> 'glyphicon glyphicon-list'
													]
												) . ' Übersicht',
												[
													'controller'	=> 'citations',
													'action'		=> 'index'
												],
												[
													'class'			=> '',
													'escape'		=> false
												]
											)
										?>
									</li>
									
									<li class="divider" role="separator"></li>
									
									<li>
										<?=
											$this->Html->link(
												$this->Html->tag(
													'span',
													'',
													[
														'class'			=> 'glyphicon glyphicon-pencil'
													]
												) . ' Zitat anlegen',
											[
												'controller'	=> 'citations',
												'action'		=> 'create'
											],
											[
												'class'			=> '',
												'escape'		=> false
											] )
										?>
									</li>
								</ul>
							</li>
						<!-- /.citations menu -->
						
						<!-- administrator menu items -->
						<!-- tags menu -->
						<!--
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<span class="glyphicon glyphicon-tags"></span>
								Tags
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li>
									<?=
										$this->Html->link(
											$this->Html->tag(
												'span',
												'',
												[
													'class'			=> 'glyphicon glyphicon-list'
												]
											) . ' Übersicht',
											[
												'controller'	=> 'tags',
												'action'		=> 'index'
											],
											[
												'class'			=> '',
												'escape'		=> false
											]
										)
									?>
								</li>
								
								<li class="divider" role="separator"></li>
								
								<li>
									<?=
										$this->Html->link(
											$this->Html->tag(
												'span',
												'',
												[
													'class'			=> 'glyphicon glyphicon-pencil'
												]
											) . ' Tag anlegen',
											[
												'controller'	=> 'tags',
												'action'		=> 'create'
											],
											[
												'class'			=> '',
												'escape'		=> false
											]
										)
									?>
								</li>
								
								<li>
									<?=
									$this->Html->link(
										$this->Html->tag(
											'span',
											'',
											[
												'class'				=> 'glyphicon glyphicon-pencil'
											]
										) . ' Synonym anlegen',
										[
											'controller'		=> 'synonyms',
											'action'			=> 'create'
										],
										[
											'class'				=> '',
											'escape'			=> false
										]
									)
									?>
								</li>
								
							</ul>
						</li>
						-->
						<!-- /.tags menu -->
						
						<!-- mediatyps menu -->
						<!-- 
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<span class="glyphicon glyphicon-book"></span>
									Medienarten
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li>
										<?=
											$this->Html->link( 'Medientypen (nur Admins)', [
												'controller'	=> 'media',
												'action'		=> 'index'
											] )
										?>
									</li>
									
									<li class="divider" role="separator"></li>
									
									<li>
										<?=
											$this->Html->link( 'Neuen Medientyp anlegen (nur Admins)', [
												'controller'	=> 'media',
												'action'		=> 'create'
											] )
										?>
									</li>
								</ul>
							</li>
						-->
						<!-- /.mediatyps menu -->
						<!-- /.administrator menu items -->
						
						<!-- export menu -->
						<!--li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Exportfunktionen <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">CSV Export</a></li>
								<li><a href="#">Bibtex Export</a></li>
							</ul>
						</li-->
						<!-- /.export menu -->
					</ul>
						
					<!-- quicklinks -->
					<ul class="nav navbar-nav navbar-left">
						<li>
						<p class="navbar-text"><strong class="text-info">Quicklinks:</strong></p>
						</li>
						<!-- citation menu -->
						<li>
							<?=
								$this->Html->link(
									$this->Html->tag( 'span',
										'',
										[
											'class'		=> 'glyphicon glyphicon-pencil'
										]
									) . ' Neues Zitat', [
									'controller'	=> 'citations',
									'action'		=> 'create'
								], [
									'escape'		=> false
								] )
							?>
						</li>
						<!-- /citation menu -->
					</ul>
					<!-- /.quicklinks -->
					
					<!-- searchbar -->
					<!--
					<form class="navbar-form navbar-right" role="search" method="post" action="">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><span class="glyphicon glyphicon-search"></div>
								<input type="text" class="form-control" name="" id="" placeholder="Suchen nach ..." />
							</div>
							<button type="submit" class="btn btn-default">Suchen</button>
						</div>
					</form>
					-->
					<!-- /.searchbar -->
					
					<!-- userspecific -->
					<ul class="nav navbar-nav navbar-right">
						<!-- usermenu variation A (anonymous user) -->
						<li>
							<?=
							$this->Html->link(
								$this->Html->tag(
									'span',
									'',
									[
										'class'			=> 'glyphicon glyphicon-list-alt'
									]
								)
								. ' Vorgemerkte Zitate '
								. $this->Html->tag(
									'span',
									$numOfFavListItems,
									[
										'class'			=> 'badge'
									]
								),
								[
									'controller'	=> 'favoritlists',
									'action'		=> 'export',
									'0'
								],
								[
									'class'			=> '',
									'escape'		=> false
								]
							)
							?>
						</li>
						<!-- /.usermenu variation A (anonymous user) -->
						
						<!-- usermenu variation B (user is logged) -->
						<!--
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="flase">
								<span class="glyphicon glyphicon-list-alt"></span>
								Vorgemerkte Zitate
								<span class="badge"><?= $exampleNum ?></span>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#"><span class="glyphicon glyphicon-list-alt"></span> <?= $exampleName ?> <span class="badge"><?= $exampleNum ?></span></a></li>
								<li><a href="#"><span class="glyphicon glyphicon-list-alt"></span> {{NAME_SECOND_FAV_LIST}} <span class="badge">100</span></a></li>
								<li><a href="#"><span class="glyphicon glyphicon-list-alt"></span> {{NAME_THIRD_FAV_LIST}} <span class="badge">38</span></a></li>
								<li><a href="#"><span class="glyphicon glyphicon-list-alt"></span> {{NAME_FOURTH_FAV_LIST}} <span class="badge">15</span></a></li>
								<li><a href="#"><span class="glyphicon glyphicon-list-alt"></span> {{NAME_FIFTH_FAV_LIST}} <span class="badge">0</span></a></li>
							</ul>
						</li>
						-->
						<!-- /.usermenu variation B (user is logged) -->
						
						<!-- 
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<span class="glyphicon glyphicon-user"></span>
								{{BENUTZERNAME}}
								<span class="caret"></span>
							</a>
							
							<ul class="dropdown-menu">
								<!-- usermenu variation A (anonymous user) -->
								<!--
								<li>
									<?=
									$this->Html->link(
										$this->Html->tag(
											'span',
											'',
											[
												'class'			=> 'glyphicon glyphicon-log-in'
											]
										) . ' Login',
										[
											'controller'	=> 'users',
											'action'		=> 'login'
										],
										[
											'class'			=> '',
											'escape'		=> false
										]
									)
									?>
								</li>
								-->
								<!-- /.usermenu variation A (anonymous user) -->
								
								<!-- usermenu variation B (user is logged) -->
								<!--
								<li>
									<?=
									$this->Html->link(
										$this->Html->tag(
											'span',
											'',
											[
												'class'			=> 'glyphicon glyphicon-credit-card'
											]
										) . ' Profil',
										[
											'controller'	=> 'users',
											'action'		=> 'editProfil'
										],
										[
											'class'			=> '',
											'escape'		=> false
										]
									)
									?>
								</li>
								
								<li>
									<?=
									$this->Html->link(
										$this->Html->tag(
											'span',
											'',
											[
												'class'			=> 'glyphicon glyphicon-wrench'
											]
										) . ' Einstellungen',
										[
											'controller'	=> 'users',
											'action'		=> 'settings'
										],
										[
											'class'			=> '',
											'escape'		=> false
										]
									)
									?>
								</li>
								
								<li class="divider" role="separator"></li>
								
								<li>
									<?=
									$this->Html->link(
										$this->Html->tag(
											'span',
											'',
											[
												'class'			=> 'glyphicon glyphicon-list'
											]
										) . ' Favoritenlisten verwalten',
										[
											'controller'	=> 'favoritlists',
											'action'		=> 'index'
										],
										[
											'class'			=> '',
											'escape'		=> false
										]
									)
									?>
								</li>
								
								<li>
									<?=
									$this->Html->link(
										$this->Html->tag(
											'span',
											'',
											[
												'class'			=> 'glyphicon glyphicon-save-file'
											]
										) . ' Favoritenliste exportieren',
										[
											'controller'	=> 'favoritlists',
											'action'		=> 'export'
										],
										[
											'class'			=> '',
											'escape'		=> false
										]
									)
									?>
								</li>
								
								<li>
									<?=
									$this->Html->link(
										$this->Html->tag(
											'span',
											'',
											[
												'class'		=> 'glyphicon glyphicon-pencil'
											]
										) . ' Favoritenliste anlegen',
										[
											'controller'	=> 'favoritlists',
											'action'		=> 'create'
										],
										[
											'class'			=> '',
											'escape'		=> false
										]
									)
									?>
								</li>
								-->
								
								<!--
								<li class="divider" role="separator"></li>
								-->
								<!-- /.usermenu variation B (user is logged) -->
								
								<!-- irrespective of user status -->
								<!--
								<li class="separator" role="separator"></li>
								-->
								<!-- /.irrespective of user status -->
								
								<!-- usermenu variation B (user is logged) -->
								<!--
								<li>
									<?=
									$this->Html->link(
										$this->Html->tag(
											'span',
											'',
											[
												'class'			=> 'glyphicon glyphicon-log-out'
											]
										) . ' Logout',
										[
											'controller'	=> 'users',
											'action'		=> 'logout'
										],
										[
											'class'			=> '',
											'escape'		=> false
										]
									)
									?>
								</li>
								-->
								<!-- /.usermenu variation B (user is logged) -->
<!--
							</ul>
						</li>
-->
					</ul>
					<!-- /.userspecific -->
				</div>				
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
			
			<!-- modal -->
			<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
			  <div class="modal-dialog modal-lg" role="document">
			    <div class="modal-content">
			      ...
			    </div>
			  </div>
			</div>
			<!-- /.modal --> 
			
		</div>
	</body>
</html>