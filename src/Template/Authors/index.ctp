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
						$this->Html->link( $author->forename . " " .$author->name, [
							'action'	=> 'view',
							$author->id
						] );
					
					?>
				</td>
				<td>
					<?= $author->born; ?>
				</td>
				<td>
					<?= $author->dead; ?>
				</td>
				<td>
					<div class="btn-group" role="group" aria-label="btn-action-grp">
						<!-- button to view author -->
						<?=
							$this->Html->link(
								$this->Html->tag(
								'span',
								'', [
									'class'			=> 'glyphicon glyphicon-eye-open'
								]
							), [
								'action'		=> 'view',
								$author->id
						], [
							'escape'		=> false,
							'class'			=> 'btn btn-xs btn-default'
						])
						?>
						<!-- /button to view author -->
						
						<!-- button to edit author -->
						<!-- <?=
							$this->Html->link(
								$this->Html->tag(
								'span',
								'', [
									'class'			=> 'glyphicon glyphicon-pencil'
								]
							), [
								'action'		=> 'edit',
								$author->id
						], [
							'escape'		=> false,
							'class'			=> 'btn btn-xs btn-default'
						])
						?>
						<!-- /button to edit author -->
						
						<!-- button to delete author -->
						<!--<?=
							$this->Html->link(
								$this->Html->tag(
								'span',
								'', [
									'class'			=> 'glyphicon glyphicon-trash'
								]
							), [
								'action'		=> 'delete',
								$author->id
						], [
							'escape'		=> false,
							'class'			=> 'btn btn-xs btn-danger'
						])
						?>
						<!-- /button to delete author -->
					</div>
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
            <?php
            echo $this->Paginator->prev(
                $this->Html->tag(
                    'span',
                    '&laquo;',
                    [
                        'class'         => '',
                        'aria-hidden'   => 'true'
                    ]
                ),
                [
                    'class'         => '',
                    'aria-label'    => 'Prev',
                    'escape'        => false
                ]
            );
            
            echo $this->Paginator->numbers();
            
            echo $this->Paginator->next(
                $this->Html->tag(
                    'span',
                    '&raquo;',
                    [
                        'class'         => '',
                        'aria-hidden'   => 'true'
                    ]
                ),
                [
                    'class'         => '',
                    'aria-label'    => 'Next',
                    'escape'        => false
                ]
            );
            ?>
        </ul>
    </nav>
</div>
<!-- /Pagination -->