		<!-- table datarows -->
		<tr>
			<td>
				<input type="text" class="form-control" name="citAttrLabel[]" value="" placeholder="Labelbezeichnung" />
			</td>
			<td>
				<textarea class="form-control" name="citAttrHelptext[]" placeholder="Text zur Hilfestellung"></textarea>
			</td>
			<td>
				<select class="form-control" name="citAttrRequirefield[]">
					<option value="true">Ja</option>
					<option value="false">Nein</option>
				</select>
			</td>
			<td>
				<select class="form-control" name="citAttrTextform[]">
					<option value="alphanumeric">Alphanumerisch</option>
					<option value="numeric">Nummerisch</option>
					<option value="yesnofield">Ja-Nein-Feld</option>
					<option value="date">Datum</option>
					<option value="datetime">Zeitangabe (hh:mm:ss)</option>
					<option value="year">Jahresangabe</option>
					<option value="checkfield">Bestätigungsfeld</option>
				</select>
			</td>
			<td>
				<input type="text" name="citAttrMaxlength[]" value="" class="form-control" placeholder="255" size="3" />
			</td>
		</tr>
		<!-- /table datarows -->
	