<div class="row">
	<!-- header -->
	<div class="page-header">
		<h1>Neues Medium anlegen</h1>
	</div>
	<!-- /header -->

	<!-- description -->
	<div class="col-md-12 col-lg-12">
		<p>
			Zum Beschreiben eines neuen Mediums können neben den allgemeinen Angaben wie dessen Bezeichnung und eine Beschreibung noch beliebig viele Attribute
			angelegt werden. Aus den angegeben Attributen werden beim Eintragen neuer Datensätze, welche diesem Medium zugeordnet werden, dann die entsprechenden
			Datenfelder in der Eingabemaske generiert.
		</p>
		<p>
			Zusätzlich kann angegeben werden, ob der Bibtex Befehl des Attributs angegeben werden, sodass beim Export in die Bibtex Datei die Bibtex Struktur automatisch
			generiert werden kann.
		</p>
		<p>
			Ebenfalls wird die Struktur von Zitaten anhand beliebig vieler Attribute im Rahmen des Mediums definiert.
		</p>
	</div>
</div>
<!-- /description -->

<!-- mediatyp attributes -->
<div class="row">
	<form class="form-horizontal" method="post">
		<!-- section header -->
		<div class="page-header">
			<h2>Metainformationen zum neuen Medium</h2>
		</div>
		<!-- /section header -->
		
		<div class="col-md-12 col-lg-12">
			<?= $this->element( 'formMediaMetainformations' ) ?>
		</div>
		
		
		<!-- header subsection mediatyp attributes -->
		<div class="page-header">
			<h2>Attribute des Mediums</h2>
		</div>
		<!-- /header subsection mediatyp attributes -->
		
		<!-- mediatyp attribute table -->
		<div class="col-md-12 col-lg-12">
			<table class="table table-striped table-bordered" id="tblMediaAttr">
				<!-- table header -->
				<tr>
					<th>Label</th>
					<th>Hilfstext</th>
					<th>Pflichtfeld?</th>
					<th>Textform</th>
					<th>Maximallänge</th>
					<th>Bibtex Attribut</th>
				</tr>
				<!-- /table header -->
				
				<!-- table datarows -->
				<?= $this->element( 'formMediaMediaAttribute' ) ?>
				<!-- /table datarows -->
			
			</table>
			<!--button class="btn btn-primary glyphicon glyphicon-plus" onclick="addAttrMediatyp()"></button-->
			
			<!-- /attribute table -->
		</div>
		
		
		<!-- header subsection citation attributes -->
		<div class="page-header">
			<h2>Attribute der Zitatstruktur</h2>
		</div>
		<!-- /header subsection citation attributes -->
			
		<!-- citation attribute table -->
		<div class="col-md-12 col-lg-12">
			<table class="table table-striped table-bordered" id="tblCitAttr">
				<!--  table header -->
				<tr>
					<th>Label</th>
					<th>Hilfstext</th>
					<th>Pflichtfeld</th>
					<th>Textform</th>
					<th>Maximallänge</th>
				</tr>
				<!--  /table header -->
				
				<!--  table datarows -->
				<?= $this->element( 'formMediaCitationAttribute' ) ?>
				<!--  /table datarows -->
			
			</table>
			<!-- /citation attribute table -->
			
			<div class="col-md-12 col-lg-12">
				<div class="form-group" align="center">
					<input class="btn btn-primary" name="" value="Anlegen" type="submit" />
				</div>
			</div>
		</form>
	</div>
</div>
<!-- /mediatyp attributes -->

<script>
if( $( document ).ready() ) {
	// add a new mediatyp attribute line if mtAttrLabel[] is set
	$( "#tblMediaAttr" ).on( "change", "tr:last input[name='mediaAttrLabel[]']", function() {
		$( "#tblMediaAttr tr:last" ).after( '<?= preg_replace( array( "/\r/", "/\n/" ), "", trim( $this->element( "formMediaMediaAttribute" ) ) ) ?>' );
	} )


	// add a new citation attribute line if citAttrLabel[] is set
	$( "#tblCitAttr" ).on( "change", "tr:last input[name='citAttrLabel[]']", function() {
		$( "#tblCitAttr tr:last" ).after( '<?= preg_replace( array( "/\r/", "/\n/" ), "", trim( $this->element( "formMediaCitationAttribute" ) ) ) ?>' );
	} )
}
</script>