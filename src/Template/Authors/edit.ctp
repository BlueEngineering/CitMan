<!-- header -->
<div class="row">
	<div class="page-header">
		<h1>Autor*in bearbeiten</h1>
	</div>
</div>
<!-- description -->

<!-- form -->
<div class="row">
	<form class="form-horizontal" method="post">
		
		<!-- author form -->
		<div class="col-md-12 col-lg-12">
			<?= $this->element( 'authors/authorEdit' ) ?>
		</div>
		<!-- /author form -->
		
		<!-- submit button -->
		<div class="col-md-12 col-lg-12">
			<div class="form-group" align="center">
				<input class="btn btn-primary" name="" value="Speichern" type="submit" />
			</div>
		</div>
		<!-- /submit button -->
		
	</form>
</div>
<!-- /form -->