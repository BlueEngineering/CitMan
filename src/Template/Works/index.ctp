<!-- header -->
<div class="row">
	<div class="page-header">
		<h1>Liste der erfassten Werke</h1>
	</div>
</div>
<!-- /header -->

<!-- form -->
<div class="row">	
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<!-- table of works -->
		<table class="table table-striped">
			<tr>
				<th style="width:45%;">Titel</th>
				<th style="width:45%;">Autor*in(en)</th>
				<th style="width:10%;">Aktionen</th>
			</tr>
			
			<!-- data list -->
			<?php foreach( $works as $work ): ?>
			<tr>
				<td>
					<?=
					$this->Html->link(
					   $work->title,
					   [
					       'action'    => 'view',
					       $work->id
					   ]
                    );
                    
					; 
				    ?>
				</td>
				
				<td>
					<!-- Autoren einzeln als Array und dann im View konkatienieren via , und Name mit Link unterlegt -->
					<?php
					foreach($work->authors as $author) {
					    if( $author["id"] != 0 ) {
    					    echo $this->Html->link(
    					       $author["name"],
    					       [
    					           'controller'    => 'authors',
    					           'action'        => 'view',
    					           $author["id"]
    					       ],
    					       [
    					           'escape'        => false,
    					           'class'         => ''
    					       ]
                            );
                        } else {
                            echo $author["name"];
                        }
                        echo "<br />";
					}
					?>
				</td>
				
				<td>
					<div class="btn-group" role="group" aria-label="btn-action-grp">
					    <!-- button to view author -->
	                    <?=
	                        $this->Html->link(
	                            $this->Html->tag(
                                'span',
                                '', [
                                    'class'         => 'glyphicon glyphicon-eye-open'
                                ]
                            ), [
                                'action'        => 'view',
                                $work->id
                        ], [
                            'escape'        => false,
                            'class'         => 'btn btn-xs btn-default'
                        ])
                    	?>
	                    <!-- /button to view author -->
	                    
	                    <!-- button to edit author -->
	                    <!--<?=
	                        $this->Html->link(
	                            $this->Html->tag(
                                'span',
                                '', [
                                    'class'         => 'glyphicon glyphicon-pencil'
                                ]
                            ), [
                                'action'        => 'edit',
                                $work->id
                        ], [
                            'escape'        => false,
                            'class'         => 'btn btn-xs btn-default'
                        ])
                   	 	?>
	                    <!-- /button to edit author -->
	                    
	                    <!-- button to delete author -->
	                    <!--<?=
	                        $this->Html->link(
	                            $this->Html->tag(
                                'span',
                                '', [
                                    'class'         => 'glyphicon glyphicon-trash'
                                ]
                            ), [
                                'action'        => 'delete',
                                $work->id
                        ], [
                            'escape'        => false,
                            'class'         => 'btn btn-xs btn-danger'
                        ])
                    	?>
	                    <!-- /button to delete author -->
	                    </div>
				</td>
			</tr>			
			<?php endforeach; ?>
			<!-- /data list -->
			
		</table>
		<!-- /table of works -->
	</div>
</div>
<!-- /form -->

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