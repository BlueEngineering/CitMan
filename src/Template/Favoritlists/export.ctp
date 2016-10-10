<div class="row">
	<div class="page-header">
		<h1>Zitate und Literaturverzeichnis exportieren</h1>
	</div>
</div>

<div class="row">
	<p>
	Einleitung Einleitung Einleitung Einleitung
	</p>
</div>

<form class="form-horizontal" method="post">
	<div class="row">
		<div class="page-header"></div>
		<!--
		<div class="form-group">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<label>Zitationsstil</label>
			</div>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<select class="form-control" name="">
					<option value="">Chicago (deutsch)</option>
					<option value="">Chicago (englisch)</option>
					<option value="">Havard (deutsch)</option>
					<option value="">Havard (englisch)</option>
					<option value="">IEEE (deutsch)</option>
					<option value="">IEEE (englisch)</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<label>Ausgabeformat der Zitate</label>
			</div>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<select class="form-control" name="">
					<option value="">Bibtex</option>
					<option value="">LaTeX</option>
					<option value="">txt Datei</option>
					<option value="">MS Word (*.doc)</option>
					<option value="">MS Word (*.docx)</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<label>Ausgabeformat des Literaturverzeichnisses</label>
			</div>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<select class="form-control" name="">
					<option value="">Bibtex</option>
					<option value="">LaTeX</option>
					<option value="">txt Datei</option>
					<option value="">MS Word (*.doc)</option>
					<option value="">MS Word (*.docx)</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<label>Speicherart</label>
			</div>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<select class="form-control" name="">
					<option value="">Textausgabe</option>
					<option value="">Download (ZIP)</option>
					<option value="">Dropbox</option>
					<option value="">google drive</option>
					<option value="">Microsoft OneDrive</option>
					<option value="">owncloud</option>
				</select>
			</div>
		</div>
		-->
		<div class="form-group">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
				<button class="btn btn-primary"><span class="glyphicon glyphicon-file-save"></span> Exportieren</button>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="page-header"></div>
		<table class="table table-hover table-striped">
			<tr>
				<th>Zitat</th>
				<th>Werk</th>
				<th>Autor(en)</th>
				<th>Aktion</th>
			</tr>
			
			<?php foreach( $rows as $row ) : ?>
			<tr>
				<td>
					<?= $row["citation"]["citationtext"] ?>
				</td>
				<td>
					<?= $row["work"]["title"] ?>
				</td>
				<td>
					<?php foreach( $row["authors"] as $author ) : ?>
					<?= $author["forename"] . ' ' . $author["name"] . '<br />' ?>
					<?php endforeach; ?>
				</td>
				<td>
					<?=
					$this->Html->link(
						$this->Html->tag(
							'span',
							'',
							[
								'class'			=> 'glyphicon glyphicon-minus'
							]
						),
						[
							'controller'	=> 'favoritlists',
							'action'		=> 'removecitationfromfavlist',
							$row["citation"]["id"]
						],
						[
							'class'			=> 'btn btn-default btn-xs',
							'escape'		=> false
						]
					);
					?>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
</form>