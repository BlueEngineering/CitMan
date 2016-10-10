<div class="row">
	<div class="page-header">
		<h1>Liste der erfassten Zitate</h1>
	</div>
</div>

<div class="row">
	<table class="table table-hover table-striped" id="tblCitationResult">
		<tr id="tblRowHead">
			<th>Zitat</th>
			<th>Werk</th>
			<th>Autor</th>
			<th>Tags</th>
			<th>Aktionen</th>
		</tr>
		
		<!--
		TODO 
		<tr id="tblRowFilter">
			<td>
				<input type="text" class="form-control" placeholder="Schlagwortfilter" name="filterCitCitation" id="filterCitCitations" />
			</td>
			<td>
				<input type="text" class="form-control" placeholder="Schlagwortfilter" name="filterCitWorks" id="filterCitWorks" />
			</td>
			<td>
				<input type="text" class="form-control" placeholder="Schlagwortfilter" name="filterCitAuthors" id="filterCitAuthors" />
			</td>
			<td>
				<input type="text" class="form-control" placeholder="Schlagwortfilter" name="filterCitTags" id="filterCitTags" />
			</td>
			<td></td>
		</tr>
		 -->
		
		<tbody id="tblCitationBody">
			<?php foreach( $rows as $row ) : ?>
			<tr>
				<td>
					<a href="citations/view/<?= $row['id'] ?>"><?= $row['citation'] ?></a>
				</td>
				<td>
					<a href="works/view/<?= $row['work']['id'] ?>"><?= $row['work']['title'] ?></a>
				</td>
				<td>
					<?php
						for( $i = 0; $i < count( $row["authors"] ); $i++ ) {
						    if( $row["authors"][$i]['id'] != '0' ) {
						        echo '<a href="authors/view/' . $row["authors"][$i]['id'] . '">' . $row["authors"][$i]['name'] . '</a><br />';
						    } else {
						        echo $row["authors"][$i]['name'] . '<br />';
						    }
						}
					?>
				</td>
				<td>
					<?php
						for( $i = 0; $i < count( $row["tags"] ); $i++ ) {
							echo '<a href="tags/view/' . $row["tags"][$i]["id"] . '"><span class="label label-primary btn-primary">' . $row["tags"][$i]["name"] . '</span></a> ';
						}
					?>
				</td>
				<td align="center">
					<div class="btn-group" role="group" aria-label="btn-action-grp">
						<?php
						// check is citation on favoritlist and set action and css class
						if( in_array( $row['id'], $this->request->session()->read( 'FavList.items' ) ) )  {
							echo $this->Html->link(
								$this->Html->tag(
									'span',
									'',
									[
										'class'			=> 'glyphicon glyphicon-paperclip'
									]
								),
								[
									'controller'	=> 'favoritlists',
									'action'		=> 'removecitationfromfavlist',
									$row['id']
								],
								[
									'class'			=> 'btn btn-primary btn-xs',
									'escape'		=> false
								]
							);
						} else {
							echo $this->Html->link(
								$this->Html->tag(
									'span',
									'',
									[
										'class'			=> 'glyphicon glyphicon-paperclip'
									]
								),
								[
									'controller'	=> 'favoritlists',
									'action'		=> 'addcitationtofavlist',
									$row['id']
								],
								[
									'class'			=> 'btn btn-default btn-xs',
									'escape'		=> false
								]
							);
						}
						?>
						
						<!--
						<?=
						$this->Html->link(
							$this->Html->tag(
								'span',
								'',
								[
									'class'			=> 'glyphicon glyphicon-eye-open'
								]
							),
							[
								'controller'	=> 'citations',
								'action'		=> 'view',
								$row['id']
							],
							[
								'class'			=> 'btn btn-default btn-xs',
								'escape'		=> false
							]
						)
						?>
						-->
						
						<!--
						<?=
						$this->Html->link(
							$this->Html->tag(
								'span',
								'',
								[
									'class'			=> 'glyphicon glyphicon-pencil'
								]
							),
							[
								'controller'	=> 'citations',
								'action'		=> 'edit',
								$row['id']
							],
							[
								'class'			=> 'btn btn-default btn-xs',
								'escape'		=> false
							]
						)
						?>
						-->
						
						<!--
						<?=
						$this->Html->link(
							$this->Html->tag(
								'span',
								'',
								[
									'class'			=> 'glyphicon glyphicon-trash'
								]
							),
							[
								'controller'	=> 'citations',
								'action'		=> 'delete',
								$row['id']
							],
							[
								'class'			=> 'btn btn-danger btn-xs',
								'escape'		=> false
							]
						)
						?>
						-->
					</div>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>


<!-- building data rows with JavaScript -->
<script>
	// wait until document is ready loaded
	if( $( document ).ready() ) {
		// ToDo: UND Verknüpfung zwischen den einzelnen Inputfeldern wenn diese Nicht-Leer sind.
		//
		$( "#filterCitCitations" ).keyup( function() {
			var rows = $( "#tblCitationBody" ).find( "tr" ).hide();
			
			if( this.value.length ) {
				var data = this.value.split( " " );
				$.each(data, function( i, v ) {
					rows.filter( ":contains('" + v + "')" ).show();
				});
			} else {
				rows.show();
			}
		} );
		
		
		//
		$( "#filterCitWorks" ).keyup( function() {
			var rows = $( "#tblCitationBody" ).find( "tr" ).hide();
			
			if( this.value.length ) {
				var data = this.value.split( " " );
				$.each(data, function( i, v ) {
					rows.filter( ":contains('" + v + "')" ).show();
				});
			} else {
				rows.show();
			}
		} );
		
		
		//
		$( "#filterCitAuthors" ).keyup( function() {
			var rows = $( "#tblCitationBody" ).find( "tr" ).hide();
			
			if( this.value.length ) {
				var data = this.value.split( " " );
				$.each(data, function( i, v ) {
					rows.filter( ":contains('" + v + "')" ).show();
				});
			} else {
				rows.show();
			}
		} );
		
		
		//
		$( "#filterCitTags" ).keyup( function() {
			var rows = $( "#tblCitationBody" ).find( "tr" ).hide();
			
			if( this.value.length ) {
				var data = this.value.split( " " );
				$.each(data, function( i, v ) {
					rows.filter( ":contains('" + v + "')" ).show();
				});
			} else {
				rows.show();
			}
		} );
	}
</script>
<!-- /building data rows with JavaScript -->