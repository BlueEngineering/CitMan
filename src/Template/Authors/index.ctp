<!-- header -->
<div class="row">
	<div class="page-header">
		<h1>Liste der erfassten Autoren</h1>
	</div>
</div>
<!-- /header -->

<!-- content body -->
<div class="row">
	<div class="col-md-12 col-lg-12">
		<table class="table table-hover table-striped">		
			<!-- table header row -->
			<tr>
				<th style="width:50%">Name</th>
				<th style="width:20%">Geburtsjahr</th>
				<th style="width:20%">Todesjahr</th>
				<th style="width:10%">Aktionen</th>
			</tr>
			<!-- /table header row -->
			
			<!-- table data rows -->
			<?php foreach($dataset as $author) : ?>
			<tr>
				<td>
					<?=
						$this->Html->link( $author["forename"] . " " .$author["name"], [
							'action'	=> 'view',
							$author["id"]
						] );
					
					?>
				</td>
				<td>
					<?= $author["borndate"]; ?>
				</td>
				<td>
					<?= $author["deaddate"]; ?>
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
								$author["id"]
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
								$author["id"]
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
								$author["id"]
						], [
							'escape'		=> false,
							'class'			=> 'btn btn-xs btn-danger'
						])
					?>
					<!-- /button to delete mediatyp -->
				</td>
			</tr>
			<?php endforeach; ?>
			<!-- /table data rows -->
		</table>
	</div>
</div>
<!-- /content body -->

<!-- Pagination -->
<div align="center">
	<nav>
		<ul class="pagination">
			<li>
				<a href="#" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>
			
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			
			<li>
				<a href="#" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>
		</ul>
	</nav>
</div>
<!-- /Pagination -->