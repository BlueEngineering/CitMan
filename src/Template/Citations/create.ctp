<!-- header -->
<div class="row">
	<div class="page-header">
		<h1>Zitate anlegen</h1>
	</div>
	<!--div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<p>
			
		</p>
	</div-->
</div>
<!-- /header -->

<!-- citation form -->
<form class="form-horizontal" method="post">
	<div class="row">
		<div class="page-header">
			<h2>Werk auswählen</h2>
		</div>
		
		<!-- including title formgroup -->
		<?= $this->element( 'formWorksTitle' ) ?>
		<!-- /including title formgroup -->
		
		<!-- hidden input -->
		<input class="form-control" type="hidden" id="worksId" name="worksid" value="" placeholder="ID des Werks" />
		<!-- /hidden input -->
		
		<!-- button to call overlay with form for creating a new work -->
		<div class="form-group">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<label></label>
			</div>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"-->
				<!--input class="btn btn-success" type="button" id="btnNewWork" value="Neues Werk anlegen" name="btnnewwork" /-->
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#btnNewWork">Neues Werk anlegen</button>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<label></label>
			</div>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"-->
				<!--input class="btn btn-success" type="button" id="btnNewWork" value="Neues Werk anlegen" name="btnnewwork" /-->
				<!-- Button trigger modal -->
				<textarea class="form-control"></textarea>
				<input class="form-control" type="text" value="<span class='badge'>test</span>" />
				<span class="badge">test</span>
			</div>
		</div>
		<!-- /button to call overlay with form for creating a new work -->
		
		<!--div class="form-group">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<label>Titel des Werks</label>
			</div>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<input class="form-control" />
			</div>
		</div-->
		<!--div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			Hier werden die Details zum Medium angezeigt
		</div-->
	</div>
	<!-- -->

	<!-- -->
	<!--div class="row">
		<div class="page-header">
			<h3>Autor(en)</h3>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<p>
				Blabla - Wird in Medium eingearbeitet, da Teilinformation des Mediums
			</p>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<table class="table table-striped">
				<tr>
					<th>Vorname</th>
					<th>Nachname</th>
					<th>Geburtstag</th>
					<th>Todestag</th>
				</tr>
				
				<tr>
					<td>1A</td>
					<td>1B</td>
					<td>1C</td>
					<td>1D</td>
				</tr>
				
				<tr>
					<td>2A</td>
					<td>2B</td>
					<td>2C</td>
					<td>2D</td>
				</tr>
				
			</table>
		</div>
	</div-->
	<!-- -->

	<!--  -->
	<div class="row">
		<div class="page-header">
			<h2>Zitate zum Werk</h2>
		</div>
		<dir class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<table class="table table-striped table-bordered" id="tblCitations">
				<!-- table header -->
				<tr>
					<th class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Zitat</th>
					<th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Position</th>
					<th class="col-xs-3 col-sm-3 col-md-3 col-lg-3">Markdown</th>
					<th class="col-xs-3 col-sm-3 col-md-3 col-lg-3">Tags</th>
				</tr>
				<!-- /table header -->
				
				<!-- table data rows -->
				<?= $this->element( 'formCitation' ) ?>
				<!-- /table data rows -->
			</table>
		</dir>
	</div>
	
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center">
			<input class="btn btn-primary" type="submit" name="citBtn" value="Speichern" />
		</div>
	</div>
</form>
<!-- /citation form -->


<!-- bootstrap modal: form for new work -->
<div class="modal fade" id="btnNewWork" tabindex="-1" role="dialog" aria-labelledby="btnNewWorkLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Neues Werk anlegen</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post" action="">
		<?= $this->element( 'formWorksTitle' ); ?>
		<?= $this->element( 'formWorksDoiType' ); ?>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
        <button type="button" class="btn btn-success">Speichern</button>
      </div>
    </div>
  </div>
</div>
<!-- /bootstrap modal: form for new work -->

<!-- Javascripts -->
<script>
if( $( document ).ready() ) {	
	// jQuery UI auto complete for titles of existing works
	$( function() {
		// load title of existing works
		var worksTitle = <?= $jsWorkTitles ?>;
		
		// call jQuery UI autocomplete function
		$( "#worksTitle" )
			.autocomplete( {
				source: worksTitle,
				
				select: function( event, ui ) {
					if( ui.item ) {
						$( "#worksId" ).val( ui.item.id );
					} else {
						$( "#worksId" ).val("");
					}
				}
			} );
	} );
	
	
	// event trigger for button btnNewWork
	//$( "#btnNewWork" ).on( "click",  )
	
	
	// add a new author line if citContent[] is set
	$( "#tblCitations" ).on( "change", "tr:last textarea[name='citContent[]']", function() {
		$( "#tblCitations tr:last" ).after( '<?= preg_replace( array( "/\r/", "/\n/" ), "", trim( $this->element( "formCitation" ) ) ) ?>' );
	} );
}
</script>
<!-- /Javascripts -->