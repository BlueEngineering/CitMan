<!-- Header -->
<div class="row">
	<div class="page-header">
		<h1>Liste der erfassten Medientypen</h1>
	</div>
</div>
<!-- /Header -->

<!-- List -->
<div class="row">
	<div class="col-md-12 col-lg-12">
		<table class="table table-striped table-hover">
			<!-- table head -->
			<tr>
				<th width="28%">Bezeichnung</th>
				<th width="62%">Beschreibung</th>
				<th width="10%">Aktionen</th>
			</tr>
			<!-- /table head -->
			
			<!-- data -->
			<?php foreach( $media as $medium ): ?>
			<tr>
				<td>
				<?=
					$this->Html->link( $medium->name, [
						'action'		=> 'view',
						$medium->id
					] );
				?>
				</td>
				<td>
				<?= $medium->description; ?>
				</td>
				<td>
				
				<!-- button to view mediatyp -->
				<?=
					$this->Html->link(
						$this->Html->tag(
							'span',
							'', [
								'class'			=> 'glyphicon glyphicon-eye-open'
							]
						), [
							'action'		=> 'view',
							$medium->id
					], [
						'escape'		=> false,
						'class'			=> 'btn btn-xs btn-info'
					])
				?>
				<!-- /button to view mediatyp -->
				
				<!-- button to edit mediatyp -->
				<?=
					$this->Html->link(
						$this->Html->tag(
							'span',
							'', [
								'class'			=> 'glyphicon glyphicon-pencil'
							]
						), [
							'action'		=> 'edit',
							$medium->id
					], [
						'escape'		=> false,
						'class'			=> 'btn btn-xs btn-warning'
					])
				?>
				<!-- /button to edit mediatyp -->
				
				<!-- button to delete mediatyp -->
				<?=
					$this->Html->link(
						$this->Html->tag(
							'span',
							'', [
								'class'			=> 'glyphicon glyphicon-trash'
							]
						), [
							'action'		=> 'delete',
							$medium->id
					], [
						'escape'		=> false,
						'class'			=> 'btn btn-xs btn-danger'
					])
				?>
				<!-- /button to delete mediatyp -->
				
				</td>
			</tr>
			<?php endforeach; ?>
			<!-- /data -->
			
		</table>
	</div>
</div>
<!-- /List -->

<!-- Pagination -->
<div align="center">
	<ul class="pagination">
		<li><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
		<li><a href="#">1</a></li>
		<li><a href="#">2</a></li>
		<li><a href="#">3</a></li>
		<li><a href="#">4</a></li>
		<li><a href="#">5</a></li>
		<li><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
	</ul>
</div>
<!-- /Pagination -->