<!-- header -->
<div class="row">
	<div class="page-header">
		<h1>Details zum/zur Autor*in</h1>
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
				<!--?=
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
				?-->
				<!-- /edit button -->
				
				<!-- delete button -->
				<!--?=
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
				?-->
				<!-- /delete button -->
			</div>
		</div>
	</div>
</div>
<!-- /header -->

<!-- data area -->
<div class="row">
	<div class="page-header">
	</div>
	
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<table class="table table-striped">
			<colgroup>
				<col style="width:25%;" />
				<col style="width:75%;" />
			</colgroup>
			
			<tr>
				<td style="font-weight:bold;">Name:</td>
				<td><?= $dataset->forename; ?> <?= $dataset->name; ?></td>
			</tr>
			
			<tr>
				<td style="font-weight:bold;">Geburtsdatum:</td>
				<td><?= $dataset->borndate; ?></td>
			</tr>
			
			<tr>
				<td style="font-weight:bold;">Todestag:</td>
				<td><?= $dataset->deaddate; ?></td>
			</tr>
		</table>
	</div>
</div>
<!-- /data area -->