<div class="row">
	<!-- header -->
	<div class="page-header">
		<h1>Neues Werk erfassen</h1>
	</div>
	<!-- /header -->
	
	<!-- description -->
	<div class="col-md-12 col-lg-12">
		<p>Angaben zum Werk, welches die Quelle ist und aus welchem die Zitate entnommen wurden.</p>
	</div>
	<!-- /description -->
</div>

<!-- form -->
<form class="form-horizontal" method="post">
	<div class="row">
		<div class="page-header">
			<h2>Allgemeine Angaben zum Werk</h2>
		</div>
		
		
		<!-- including title formgroup -->
		<?= $this->element( 'formWorksTitle' ) ?>
		<!-- /including title formgroup -->
		
		<!-- including formgroup for DOI and mediatyp -->
		<?= $this->element( 'formWorksDoiType' ) ?>
		<!-- /including formgroup for DOI and mediatyp -->
		
	</div>

	<div class="row">
		<div class="page-header">
			<h2>Autoren des Werks</h2>
		</div>
		
		<!-- table of authors -->
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<table class="table table-striped table-bordered" id="tblAuthors">
				<!-- table header -->
				<tr>
					<th>Nachname</th>
					<th>Vorname</th>
					<th>Geburtsdatum</th>
					<th>Todestag</th>
				</tr>
				<!-- /table header -->
				
				<!-- table rows -->
					<!-- include author table row element -->
					<?= $this->element( 'formAuthorTbl' ) ?>
					<!-- /include author table row element -->
				<!-- /table rows -->
			</table>
		</div>
		<!-- /table of authors -->
	</div>

	<div class="row">
		<div class="page-header">
			<h2>Weitere Angaben zum Werk</h2>
		</div>
		
		<!-- including formgroup for details of works -->
		<?= $this->element( 'formWorksDetailAttributes' ) ?>
		<!-- /including formgroup for details of works -->
		
		
		
	</div>
	
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center;">
			<input class="btn btn-primary" type="submit" name="btnSave" value="Speichern" />
		</div>
	</div>
</form>
<!-- /form -->

<!-- Javascripts -->
<script>
if( $( document ).ready() ) {
	// add a new author line if authorname[] and authorforename[] is set
	//$( "#tblAuthors" ).on( "change", "tr:last input[name='authorname[]'], tr:last input[name='authorforename[]']", function() {
	$( "#tblAuthors" ).on( "change", "tr:last input[name='authorname[]']", function() {
		$( "#tblAuthors tr:last" ).after( '<?= preg_replace( array( "/\r/", "/\n/" ), "", trim( $this->element( "formAuthorTbl" ) ) ) ?>' );
	} )
}
</script>
<!-- /Javascripts -->