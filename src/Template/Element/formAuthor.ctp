		<!-- name  -->
		<div class="form-group">
			<!-- label -->
			<div class="col-md-2 col-lg-2">
				<label>Nachname:</label>
			</div>
			<!-- /label -->
			
			<!-- formfield -->
			<div class="col-md-10 col-lg-10">
				<input class="form-control" name="authorname" value="" maxlength="150" type="text" placeholder="Nachname(n) des Autors/der Autorin." required />
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
				<input class="form-control" name="authorforename" value="" maxlength="150" type="text" placeholder="Vorname(n) des Autors/der Autorin." />
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
				<input class="form-control" name="authordayofborn" value="" size="2" maxlength="2" type="text" placeholder="TT" />
			</div>
			
			<div class="col-md-3 col-lg-3">
				<select class="form-control" name="authormonthofborn">
					<option value="00">keine Angabe</option>
					<option value="01">Januar</option>
					<option value="02">Februar</option>
					<option value="03">März</option>
					<option value="04">April</option>
					<option value="05">Mai</option>
					<option value="06">Juni</option>
					<option value="07">Juli</option>
					<option value="08">August</option>
					<option value="09">September</option>
					<option value="10">Oktober</option>
					<option value="11">November</option>
					<option value="12">Dezember</option>
				</select>
			</div>
			
			<div class="col-md-3 col-lg-3">
				<input class="form-control" name="authoryearofborn" value="" size="4" maxlength="4" type="text" placeholder="JJJJ" />
			</div>
			
			<div class="col-md-2 col-lg-2">
				<select class="form-control" name="authorsuffixyearofborn">
					<option value="1">n.Chr.</option>
					<option value="0">v.Chr.</option>
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
				<input class="form-control" name="authordayofdead" value="" size="2" maxlength="2" type="text" placeholder="TT" />
			</div>
			
			<div class="col-md-3 col-lg-3">
				<select class="form-control" name="authormonthofdead">
					<option value="00">keine Angabe</option>
					<option value="01">Januar</option>
					<option value="02">Februar</option>
					<option value="03">März</option>
					<option value="04">April</option>
					<option value="05">Mai</option>
					<option value="06">Juni</option>
					<option value="07">Juli</option>
					<option value="08">August</option>
					<option value="09">September</option>
					<option value="10">Oktober</option>
					<option value="11">November</option>
					<option value="12">Dezember</option>
				</select>
			</div>
			
			<div class="col-md-3 col-lg-3">
				<input class="form-control" name="authoryearofdead" value="" size="4" maxlength="4" type="text" placeholder="JJJJ" />
			</div>
			
			<div class="col-md-2 col-lg-2">
				<select class="form-control" name="authorsuffixyearofdead">
					<option value="1">n.Chr.</option>
					<option value="0">v.Chr.</option>
				</select>
			</div>
			<!-- /formfield -->
		</div>
		<!-- /day of death -->