<div class="row">
	<!-- header -->
	<div class="page-header">
		<h1>Medium bearbeiten</h1>
	</div>
	<!-- /header -->
	
	<!-- description -->
	<div class="col-md-12 col-lg-12">
		<p>Beschreibung</p>
	</div>
</div>
<!-- /description -->

<!-- mediatyp attributes -->
<div class="row">
	<form class="form-horizontal" method="post">
		<!-- section header -->
		<div class="page-header">
			<h2>Metainformationen zum Medium</h2>
		</div>
		<!-- /section header -->
	
		<div class="col-md-12 col-lg-12">
		<!-- mediatyp meta informations -->
			<!-- mediatypname -->
			<div class="form-group">
				<div class="col-md-2 col-lg-2">
					<label>Bezeichnung:</label>
				</div>
				<div class="col-md-10 col-lg-10">
					<input type="text" class="form-control" name="medianame" placeholder="Name des neuen Medientyps." value="<?= $dataset->name; ?>" required />
				</div>
			</div>
			<!-- /mediatypname -->
			
			<!-- mediatypdescription -->
			<div class="form-group">
				<div class="col-md-2 col-lg-2">
					<label>Beschreibung:</label>
				</div>
				<div class="col-md-10 col-lg-10">
					<textarea class="form-control" name="mediadescription" rows="5" placeholder="Detailierte Beschreibung des Medientyps." required><?= $dataset->description; ?></textarea>
				</div>
			</div>
			<!-- /mediatypdescription -->
		<!-- /mediatyp meta informations -->
		</div>
		
		
		<!-- header subsection mediatyp attributes -->
		<div class="page-header">
			<h2>Attribute des Mediums</h2>
		</div>
		<!-- /header subsection mediatyp attributes -->
		
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
				
				<!-- load dataset -->
				<?php for( $i = 0; $i < count( $dataset["objectmodel_media"] ); $i++ ) { ?>
				
				<tr>
					<td>
						<input type="text" class="form-control" name="mediaAttrLabel[]" value="<?= $dataset["objectmodel_media"][$i]->label; ?>" placeholder="Labelbezeichnung" />
					</td>
					<td>
						<textarea class="form-control" name="mediaAttrHelptext[]" placeholder="Text zur Hilfestellung"><?= $dataset["objectmodel_media"][$i]->helptext; ?></textarea>
					</td>
					<td>
						<select class="form-control" name="mediaAttrRequirefield[]">
							<?php
							if($dataset["objectmodel_media"][$i]->required == "true") {
								echo '<option value="true" selected>Ja</option>';
								echo '<option value="false">Nein</option>';
							} else {
								echo '<option value="true">Ja</option>';
								echo '<option value="false" selected>Nein</option>';
							}
							?>
						</select>
					</td>
					<td>
						<select class="form-control" name="mediaAttrTextform[]">
						<?php
							if($dataset["objectmodel_media"][$i]->format == 'alphanumeric') {
								echo '<option value="alphanumeric" selected>Alphanumerisch</option>';
							} else {
								echo '<option value="alphanumeric">Alphanumerisch</option>';
							}
							
							if($dataset["objectmodel_media"][$i]->format == 'numeric') {
								echo '<option value="numeric" selected>Nummerisch</option>';
							} else {
								echo '<option value="numeric">Nummerisch</option>';
							}
							
							if($dataset["objectmodel_media"][$i]->format == 'yesnofield') {
								echo '<option value="yesnofield" selected>Ja-Nein-Feld</option>';
							} else {
								echo '<option value="yesnofield">Ja-Nein-Feld</option>';
							}
							
							if($dataset["objectmodel_media"][$i]->format == 'date') {
								echo '<option value="date" selected>Datum</option>';
							} else {
								echo '<option value="date">Datum</option>';
							}
							
							if($dataset["objectmodel_media"][$i]->format == 'datetime') {
								echo '<option value="datetime" selected>Zeitangabe (hh:mm:ss)</option>';
							} else {
								echo '<option value="datetime">Zeitangabe (hh:mm:ss)</option>';
							}
							
							if($dataset["objectmodel_media"][$i]->format == 'year') {
								echo '<option value="year" selected>Jahresangabe</option>';
							} else {
								echo '<option value="year">Jahresangabe</option>';
							}
							
							if($dataset["objectmodel_media"][$i]->format == 'checkfield') {
								echo '<option value="checkfield" selected>Bestätigungsfeld</option>';
							} else {
								echo '<option value="checkfield">Bestätigungsfeld</option>';
							}
						?>
						</select>
					</td>
					<td>
						<input type="text" class="form-control" name="mediaAttrMaxlength[]" value="<?= $dataset["objectmodel_media"][$i]->maxlength; ?>" placeholder="255" size="3" />
					</td>
					<td>
						<input type="text" class="form-control" name="mediaAttrBibtexattr[]" value="<?= $dataset["objectmodel_media"][$i]->bibtex; ?>" placeholder="bibtex Name" />
					</td>
				</tr>
				<?php } ?>
				<!-- /load dataset -->
				
				<!-- new table datarows -->
				<?= $this->element( 'formMediaMediaAttribute' ) ?>
				<!-- /new table datarows -->
			
			</table>
		</div>
		
			
		<!-- header subsection citation attributes -->
		<div class="page-header">
			<h2>Attribute der Zitatstruktur</h2>
		</div>
		<!-- /header subsection citation attributes -->
		
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
				
				<!-- load dataset -->
				<?php for( $i = 0; $i < count($dataset["objectmodel_citation"]); $i++ ) { ?>
				
				<tr>
					<td>
						<input type="text" class="form-control" name="citAttrLabel[]" value="<?= $dataset["objectmodel_citation"][$i]->label; ?>" placeholder="Labelbezeichnung" />
					</td>
					<td>
						<textarea class="form-control" name="citAttrHelptext[]" placeholder="Text zur Hilfestellung"><?= $dataset["objectmodel_citation"][$i]->helptext; ?></textarea>
					</td>
					<td>
						<select class="form-control" name="citAttrRequirefield[]">
							<?php
							if($dataset["objectmodel_citation"][$i]->required == "true") {
								echo '<option value="true" selected>Ja</option>';
								echo '<option value="false">Nein</option>';
							} else {
								echo '<option value="true">Ja</option>';
								echo '<option value="false" selected>Nein</option>';
							}
							?>
						</select>
					</td>
					<td>
						<select class="form-control" name="citAttrTextform[]">
						<?php
							if($dataset["objectmodel_citation"][$i]->format == 'alphanumeric') {
								echo '<option value="alphanumeric" selected>Alphanumerisch</option>';
							} else {
								echo '<option value="alphanumeric">Alphanumerisch</option>';
							}
							
							if($dataset["objectmodel_citation"][$i]->format == 'numeric') {
								echo '<option value="numeric" selected>Nummerisch</option>';
							} else {
								echo '<option value="numeric">Nummerisch</option>';
							}
							
							if($dataset["objectmodel_citation"][$i]->format == 'yesnofield') {
								echo '<option value="yesnofield" selected>Ja-Nein-Feld</option>';
							} else {
								echo '<option value="yesnofield">Ja-Nein-Feld</option>';
							}
							
							if($dataset["objectmodel_citation"][$i]->format == 'date') {
								echo '<option value="date" selected>Datum</option>';
							} else {
								echo '<option value="date">Datum</option>';
							}
							
							if($dataset["objectmodel_citation"][$i]->format == 'datetime') {
								echo '<option value="datetime" selected>Zeitangabe (hh:mm:ss)</option>';
							} else {
								echo '<option value="datetime">Zeitangabe (hh:mm:ss)</option>';
							}
							
							if($dataset["objectmodel_citation"][$i]->format == 'year') {
								echo '<option value="year" selected>Jahresangabe</option>';
							} else {
								echo '<option value="year">Jahresangabe</option>';
							}
							
							if($dataset["objectmodel_citation"][$i]->format == 'checkfield') {
								echo '<option value="checkfield" selected>Bestätigungsfeld</option>';
							} else {
								echo '<option value="checkfield">Bestätigungsfeld</option>';
							}
						?>
						</select>
					</td>
					<td>
						<input type="text" name="citAttrMaxlength[]" value="<?= $dataset["objectmodel_citation"][$i]->maxlength; ?>" class="form-control" placeholder="255" size="3" />
					</td>
				</tr>
				
				<?php } ?>
				<!-- /load dataset -->
	
			
				<!-- new table datarows -->
				<?= $this->element( 'formMediaCitationAttribute' ) ?>
				<!-- /new table datarows -->
			
			</table>
		</div>
		<div class="col-md-12 col-lg-12">
			<div class="form-group" align="center">
				<input class="btn btn-primary" name="" value="Speichern" type="submit" />
			</div>
		</div>
	</form>
</div>

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