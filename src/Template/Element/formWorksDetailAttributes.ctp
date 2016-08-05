<!-- attribute journal -->
<div class="form-group">
	<!-- label -->
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<label>Ausgabe</label>
	</div>
	<!-- /label -->
	<!-- input field -->
	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
		<input class="form-control" name="worksjournal" id="worksJournal" value="" type="text" placeholder="Angaben zur Ausgabe in welcher die Quelle enthalten ist." />
	</div>
	<!-- /input field -->
</div>
<!-- /attribute journal -->
	
<!-- attribute volume -->
<div class="form-group">
	<!-- label -->
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<label>Sammelband</label>
	</div>
	<!-- /label -->
	<!-- input field -->
	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
		<input class="form-control" name="worksvolume" id="worksVolume" value="" type="text" placeholder="Angaben zum Sammelband in welchem die Quelle enthalten ist." />
	</div>
	<!-- /input field -->
</div>
<!-- /attribute volume -->

<!-- attribute editor -->
<div class="form-group">
	<!-- label -->
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<label>Herausgeber</label>
	</div>
	<!-- /label -->
	<!-- input field -->
	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
		<input class="form-control" name="workseditor" id="worksEditor" value="" type="text" placeholder="Namen der Herausgeber. Trennung durch Kommata." />
	</div>
	<!-- /input field -->
</div>
<!-- /attribute editor -->

<!-- attribute publisher -->
<div class="form-group">
	<!-- label -->
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<label>Verlag</label>
	</div>
	<!-- /label -->
	<!-- input field -->
	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
		<input class="form-control" name="workspublisher" id="worksPublisher" value="" type="text" placeholder="Name des herausgebenden Verlags." />
	</div>
	<!-- /input field -->
</div>
<!-- /attribute publisher -->

<!-- attribute year of publishing -->
<div class="form-group">
	<!-- label -->
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<label>Veröffentlichungsjahr</label>
	</div>
	<!-- /label -->
	<!-- input field -->
	<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
		<input class="form-control" name="worksyearofpublishing" id="worksYearOfPublishing" value="" type="text" maxlength="4" placeholder="z.B. 2016" />
	</div>
	
	<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
		<select class="form-control" name="worksyearofpublishingsuffix">
			<option value="1">n. Chr.</option>
			<option value="0">v. Chr.</option>
		</select>
	</div>
	<!-- /input field -->
</div>
<!-- /attribute year of publishing -->

<!-- attribute place of publishing -->
<div class="form-group">
	<!-- label -->
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<label>Veröffentlichungsort</label>
	</div>
	<!-- /label -->
	<!-- input field -->
	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
		<input class="form-control" name="worksplaceofpublishing" id="worksPlaceOfPublishing" value="" type="text" maxlength="150" placeholder="Ort der Herausgabe, meistens auch Sitz des Verlags." />
	</div>
	<!-- /input field -->
</div>
<!-- /attribute place of publishing -->

<!-- attribute total_volume -->
<div class="form-group">
	<!-- label -->
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<label>Gesamtumfang</label>
	</div>
	<!-- /label -->
	<!-- input field -->
	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
		<input class="form-control" name="workstotalvolume" id="worksTotalVolume" value="" type="text" maxlength="10" placeholder="Je nach Medientyp entweder die Gesamtseitenzahl oder die Spieldauer in hh:mm:ss" />
	</div>
	<!-- /input field -->
</div>
<!-- /attribute total_volume -->

<!-- attribute ean / isbn -->
<div class="form-group">
	<!-- label -->
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<label>EAN / ISBN</label>
	</div>
	<!-- /label -->
	<!-- input field -->
	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
		<input class="form-control" name="workseanisbn" id="worksEanIsbn" value="" type="text" maxlength="15" placeholder="EAN bzw ISBN Angabe." />
	</div>
	<!-- /input field -->
</div>
<!-- /attribute ean / isbn -->

<!-- attribute link -->
<div class="form-group">
	<!-- label -->
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<label>Weblink</label>
	</div>
	<!-- /label -->
	<!-- input field -->
	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
		<input class="form-control" name="workslink" id="worksLink" value="" type="text" placeholder="Beispielsweise ein Weblink zu einem Blog Beitrag." />
	</div>
	<!-- /input field -->
</div>
<!-- /attribute link -->

<!-- attribute link call timestamp -->
<div class="form-group">
	<!-- label -->
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<label>Zeitpunkt des Aufrufs des Weblinks</label>
	</div>
	<!-- /label -->
	<!-- input field -->
	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
		<input class="form-control" name="workslinkcall" id="worksLinkCall" value="<?php echo date("d.m.Y H:i"); ?>" type="text" maxlength="16" placeholder="Zeitpunkt des Abrufs des Weblinks im Format: tt.mm.jjjj hh:mm" />
	</div>
	<!-- /input field -->
</div>
<!-- /attribute link call timestamp -->

<!-- attribute filename -->
<div class="form-group">
	<!-- label -->
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<label>Dateiname</label>
	</div>
	<!-- /label -->
	<!-- input field -->
	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
		<input class="form-control" name="worksfile" id="worksFile" value="" type="text" placeholder="Name der Datei, falls die Quelle digital vorliegt." />
	</div>
	<!-- /input field -->
</div>
<!-- /attribute filename -->