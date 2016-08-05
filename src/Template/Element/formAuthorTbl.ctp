<!-- table row -->
<tr>
	<!-- author surname field -->
	<td class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<input class="form-control" name="authorname[]" type="text" placeholder="Nachname" />
	</td>
	<!-- /author surname field -->
	
	<!-- author forname field -->
	<td class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<input class="form-control" name="authorforename[]" type="text" placeholder="Vorname" />
	</td>
	<!-- /author forname field -->
	
	<!-- author day of born field -->
	<td class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<!-- day of dead field -->
		<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
			<input class="form-control" name="authordayofbirth[]" value="" size="10" maxlength="10" type="text" placeholder="TT.MM.JJJJ" />
		</div>
		<!-- /day of dead field -->
		
		<!-- suffix year of dead -->
		<div class="col-md-5 col-lg-5">
			<select class="form-control" name="authorsuffixyearofbirth[]">
				<option value="1">n.Chr.</option>
				<option value="0">v.Chr.</option>
			</select>
		</div>
		<!-- /suffix year of dead -->
	</td>
	<!-- /author day of born field -->
	
	<!-- author day of dead field -->
	<td class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<!-- day of dead field -->
		<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
			<input class="form-control" name="authordayofdead[]" value="" size="10" maxlength="10" type="text" placeholder="TT.MM.JJJJ" />
		</div>
		<!-- /day of dead field -->
		
		<!-- suffix year of dead -->
		<div class="col-md-5 col-lg-5">
			<select class="form-control" name="authorsuffixyearofdead[]">
				<option value="1">n.Chr.</option>
				<option value="0">v.Chr.</option>
			</select>
		</div>
		<!-- /suffix year of dead -->
	</td>
	<!-- /author day of dead field -->
	
</tr>
<!-- /table row -->