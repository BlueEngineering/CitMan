<!-- site header -->
<div class="row">
	<div class="page-header">
		<h1>Detailansicht des Medientyps</h1>
	</div>
	<div class="col-md-12 col-lg-12">
		<div class="btn-toolbar" role="toolbar" aria-label="viewtoolbar">
			<div class="btn-group" role="group" aria-label="actionbar">
				<!-- preview button -->
				<?=
					$this->Html->link(
						$this->Html->tag(
							'span',
							' ', [
								'class'			=> 'glyphicon glyphicon-arrow-left'
							]
						) . ' zur Übersicht', [
							'action'		=> 'index',
							$dataset->id
					], [
						'escape'		=> false,
						'class'			=> 'btn btn-sm btn-success'
					])
				?>
				<!-- /preview button -->
				
				<!-- edit button -->
				<?=
					$this->Html->link(
						$this->Html->tag(
							'span',
							' ', [
								'class'			=> 'glyphicon glyphicon-pencil'
							]
						) . ' Bearbeiten', [
							'action'		=> 'edit',
							$dataset->id
					], [
						'escape'		=> false,
						'class'			=> 'btn btn-sm btn-warning'
					])
				?>
				<!-- /edit button -->
				
				<!-- delete button -->
				<?=
					$this->Html->link(
						$this->Html->tag(
							'span',
							' ', [
								'class'			=> 'glyphicon glyphicon-trash'
							]
						) . ' Löschen', [
							'action'		=> 'delete',
							$dataset->id
					], [
						'escape'		=> false,
						'class'			=> 'btn btn-sm btn-danger'
					])
				?>
				<!-- /delete button -->
			</div>
		</div>
	</div>
</div>
<!-- /site header -->

<!-- mediatyp metadata -->
<div class="row">
	<div class="page-header">
		<h2>Metadaten des Medientyps</h2>
	</div>
	
	<div class="col-md-12 col-lg-12">
		<table class="table table-striped">
			<colgroup>
				<col style="width:25%;" />
				<col style="width:75%;" />
			</colgroup>
			
			<!-- identifier -->
			<tr>
				<td style="font-weight:bold;">Eindeutige Identifikationsnummer:</td>
				<td><?= $dataset->id; ?></td>
			</tr>
			<!-- /identifier -->
			<!-- name -->
			<tr>
				<td style="font-weight:bold;">Bezeichnung:</td>
				<td><?= $dataset->name; ?></td>
			</tr>
			<!-- /name -->
			<!-- description -->
			<tr>
				<td style="font-weight:bold;">Beschreibung:</td>
				<td><?= $dataset->description; ?></td>
			</tr>
			<!-- /description -->
		</table>
	</div>
</div>
<!-- /mediatyp metadata -->

<!-- mediatyp objectmodel -->
<div class="row">
	<div class="page-header">
		<h2>Datenstruktur der Medien</h2>
	</div>
	
	<div class="col-md-12 col-lg-12">
		<table class="table table-striped">
			
			<tr>
				<th>Label</th>
				<th>Hilfstext</th>
				<th>Pflichtfeld?</th>
				<th>Textform</th>
				<th>Maximallänge</th>
				<th>Bibtex</th>
			</tr>
			
			<!-- attributes -->
			<?php
			if( count( $dataset["objectmodel_citation"] ) > 0 )
				foreach( $dataset["objectmodel_media"] as $media ):
			?>
				<tr>
					<td><?= $media->label; ?></td>
					<td><?= $media->helptext; ?></td>
					<td><?= $media->required; ?></td>
					<td><?= $media->format; ?></td>
					<td><?= $media->maxlength; ?></td>
					<td><?= $media->bibtex; ?></td>
				</tr>
			<?php
				endforeach
			?>
			<!-- /attributes -->
		</table>
	</div>
</div>
<!-- /mediatyp objectmodel -->

<!-- mediatyp citationobjectmodel -->
<div class="row">
	<div class="page-header">
		<h2>Datenstruktur der Zitate</h2>
	</div>
	
	<div class="col-md-12 col-lg-12">
		<table class="table table-striped">
			<tr>
				<th>Label</th>
				<th>Hilfstext</th>
				<th>Pflichtfeld?</th>
				<th>Textform</th>
				<th>Maximallänge</th>
			</tr>
			
			<!-- attributes -->
			<?php
			if( count( $dataset["objectmodel_citation"] ) > 0 )
				foreach( $dataset["objectmodel_citation"] as $citation ):
			?>
				<tr>
					<td><?= $citation->label; ?></td>
					<td><?= $citation->helptext; ?></td>
					<td><?= $citation->required; ?></td>
					<td><?= $citation->format; ?></td>
					<td><?= $citation->maxlength; ?></td>
				</tr>
			<?php
				endforeach
			?>
			<!-- /attributes -->
		</table>
	</div>
</div>
<!-- /mediatyp citationobjectmodel -->