		<!-- table datarows -->
		<tr>
			<td>
				<input type="text" class="form-control" name="mediaAttrLabel[]" placeholder="Labelbezeichnung" data-toggle="tooltip" data-placement="bottom" title="Tooltip" />
			</td>
			<td>
				<textarea class="form-control" name="mediaAttrHelptext[]" placeholder="Text zur Hilfestellung"></textarea>
			</td>
			<td>
				<select class="form-control" name="mediaAttrRequirefield[]">
					<option value="true">Ja</option>
					<option value="false">Nein</option>
				</select>
			</td>
			<td>
				<select class="form-control" name="mediaAttrTextform[]">
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
				<input type="text" class="form-control" name="mediaAttrMaxlength[]" placeholder="255" size="3" />
			</td>
			<td>
				<input type="text" class="form-control" name="mediaAttrBibtexattr[]" placeholder="bibtex Name" />
			</td>
		</tr>
		<!-- /table datarows -->
	