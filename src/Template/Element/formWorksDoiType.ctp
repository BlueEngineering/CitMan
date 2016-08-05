<!-- field DOI -->
<div class="form-group">
	<!-- label -->
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<label>Digital Object Identifier (DOI)</label>
	</div>
	<!-- /label -->
	
	<!-- attribut -->
	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
		<input class="form-control" name="worksdoi" id="worksDoi" value="" maxlength="150" type="text" placeholder="Digital Object Identifier (DOI) des Werks." />
	</div>
	<!-- /attribut -->
</div>
<!-- /field DOI -->

<!-- field mediatyp -->
<div class="form-group">
	<!-- label -->
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<label>Medientyp</label>
	</div>
	<!-- /label -->
	
	<!-- attribute -->
	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
		<select class="form-control" name="workstyp" id="selectedMediatyp">
			<option value="0">Bitte wählen...</option>
			<?php
			foreach($mediatypArray as $mediatyp) {
				echo '<option value="' . $mediatyp->id . '">' . $mediatyp->name . '</option>';
			}
			?>
		</select>
		<!--span class="help-block" id="descriptionMediatyp"></span-->
	</div>
	<!-- /attribute -->
</div>
<!-- /field mediatyp -->