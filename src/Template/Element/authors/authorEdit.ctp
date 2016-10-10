		<!-- id as hidden field -->
		<input type="hidden" name="authorid" value="<?= $data->id ?>" />
		<!-- /id -->
		
		<!-- name  -->
		<div class="form-group">
			<!-- label -->
			<div class="col-md-2 col-lg-2">
				<label>Nachname:</label>
			</div>
			<!-- /label -->
			
			<!-- formfield -->
			<div class="col-md-10 col-lg-10">
				<input class="form-control" name="authorname" value="<?= $data->name ?>" maxlength="150" type="text" placeholder="Nachname(n) des Autors/der Autorin." required />
			</div>
			<!-- /formfield -->
		</div>
		<!-- /name  -->
		
		<!-- name  -->
		<div class="form-group">
			<!-- label -->
			<div class="col-md-2 col-lg-2">
				<label>Vorname:</label>
			</div>
			<!-- /label -->
			
			<!-- formfield -->
			<div class="col-md-10 col-lg-10">
				<input class="form-control" name="authorforename" value="<?= $data->forename ?>" maxlength="150" type="text" placeholder="Vorname(n) des Autors/der Autorin." />
			</div>
			<!-- /formfield -->
		</div>
		<!-- /name  -->
		
		<!-- birthday -->
		<div class="form-group">
			<!-- label -->
			<div class="col-md-2 col-lg-2">
				<label>Geburtsdatum:</label>
			</div>
			<!-- /label -->
			
			<!-- formfield -->
			<div class="col-md-2 col-lg-2">
				<input class="form-control" name="authordayofborn" value="<?= $data->bornday ?>" size="2" maxlength="2" type="text" placeholder="TT" />
			</div>
			
			<div class="col-md-3 col-lg-3">
				<input class="form-control" name="authormonthofborn" value="<?= $data->bornmonth ?>" size="2" maxlength="2" type="text" placeholder="MM" />
			</div>
			
			<div class="col-md-3 col-lg-3">
				<input class="form-control" name="authoryearofborn" value="<?= $data->bornyear ?>" size="4" maxlength="4" type="text" placeholder="JJJJ" />
			</div>
			
			<div class="col-md-2 col-lg-2">
				<select class="form-control" name="authorsuffixyearofborn">
					<?php
					if( $data->born_suffix == 0 ) {
						echo '<option value="1">n.Chr.</option>';
						echo '<option value="0" selected>v.Chr.</option>';
					} elseif( $data->born_suffix == 1 ) {
						echo '<option value="1" selected>n.Chr.</option>';
						echo '<option value="0">v.Chr.</option>';
					} else {
						echo '<option value="1">n.Chr.</option>';
						echo '<option value="0">v.Chr.</option>';
					}
					?>
				</select>
			</div>
			<!-- /formfield -->
		</div>
		<!-- /birthday -->
		
		<!-- day of death -->
		<div class="form-group">
			<!-- label -->
			<div class="col-md-2 col-lg-2">
				<label>Todestag:</label>
			</div>
			<!-- /label -->
			
			<!-- formfield -->
			<div class="col-md-2 col-lg-2">
				<input class="form-control" name="authordayofdead" value="<?= $data->deadday ?>" size="2" maxlength="2" type="text" placeholder="TT" />
			</div>
			
			<div class="col-md-3 col-lg-3">
				<input class="form-control" name="authormonthofdead" value="<?= $data->deadmonth ?>" size="2" maxlength="2" type="text" placeholder="MM" />
			</div>
			
			<div class="col-md-3 col-lg-3">
				<input class="form-control" name="authoryearofdead" value="<?= $data->deadyear ?>" size="4" maxlength="4" type="text" placeholder="JJJJ" />
			</div>
			
			<div class="col-md-2 col-lg-2">
				<select class="form-control" name="authorsuffixyearofdead">
					<?php
					if( $data->dead_suffix == 0 ) {
						echo '<option value="1">n.Chr.</option>';
						echo '<option value="0" selected>v.Chr.</option>';
					} elseif( $data->dead_suffix == 1 ) {
						echo '<option value="1" selected>n.Chr.</option>';
						echo '<option value="0">v.Chr.</option>';
					} else {
						echo '<option value="1">n.Chr.</option>';
						echo '<option value="0">v.Chr.</option>';
					}
					?>
				</select>
			</div>
			<!-- /formfield -->
		</div>
		<!-- /day of death -->