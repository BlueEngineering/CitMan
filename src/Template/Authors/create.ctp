<!-- header -->
<div class="row">
	<div class="page-header">
		<h1>Autor*in anlegen</h1>
	</div>
	<div class="col-md-12 col-lg-12">
		<p>
			Autoren sind Urheber von Quellen. Um bei Namensgleichheit eine eindeutige Zuordnung vornehmen zu können werden zusätzlich zu den Vor- und Nachnamen auch das Geburtsdatum und, falls vorhanden, der Todestag mit erfasst.
		</p>
		<p>
			Dieses Formular dient hauptsächlich dazu die Stammdaten an Autoren auch unabhängig von ihren Quellen erfassen zu können und somit eine Vorauswahl beim Anlegen von Quellen und Zitaten vornehmen zu können.
		</p>
	</div>
</div>
<!-- description -->

<!-- form -->
<div class="row">
	<div class="page-header"></div>
	<form class="form-horizontal" method="post">
		
		<!-- author form -->
		<div class="col-md-12 col-lg-12">
			<?= $this->element( 'authors/authorCreate' ) ?>
		</div>
		<!-- /author form -->
		
		<!-- submit button -->
		<div class="col-md-12 col-lg-12">
			<div class="form-group" align="center">
				<input class="btn btn-primary" name="" value="Anlegen" type="submit" />
			</div>
		</div>
		<!-- /submit button -->
		
	</form>
</div>
<!-- /form -->