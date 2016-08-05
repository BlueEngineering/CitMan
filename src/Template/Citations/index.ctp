<div class="page-header">
	<h1>Liste der erfassten Zitate</h1>
</div>

<div>
	<table class="table table-hover table-striped" id="tblCitationResult">
		<tr id="tblRowHead">
			<th>Zitat</th>
			<th>Werk</th>
			<th>Autor</th>
			<th>Tags</th>
		</tr>
		
		<thead id="tblRowFilter">
		<tr>
			<td>Zitat</td><!--input type="text" class="form-control" placeholder="Schlagwortfilter" name="filterCitCitation" id="filterCitCitations" /-->
			<td>Werk</td><!--input type="text" class="form-control" placeholder="Schlagwortfilter" name="filterCitWorks" id="filterCitWorks" /-->
			<td>Autor</td><!--input type="text" class="form-control" placeholder="Schlagwortfilter" name="filterCitAuthors" id="filterCitAuthors" /-->
			<td>Tag</td><!--input type="text" class="form-control" placeholder="Schlagwortfilter" name="filterCitTags" id="filterCitTags" /-->
		</tr>
		</thead>
		
		<!--tbody id="tblCitationBody"-->
		<tbody>
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
							echo '<a href="authors/view/' . $row["authors"][$i]['id'] . '">' . $row["authors"][$i]['name'] . '</a><br />';
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
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>


<!-- building data rows with JavaScript -->
<script>
	// wait until document is ready loaded
	if( $( document ).ready() ) {
		// Setup - add a text input to each footer cell
	    $('#tblRowFilter tr td').each( function () {
	        var title = $(this).text();
	        $(this).html( '<input type="text" class="form-control" placeholder="Suche ' + title + '" />' );
	    } );
	 
	    // DataTable
	    var table = $('#tblCitationResult').DataTable();
	 
	    // Apply the search
	    table.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.header() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );
		
		/*
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
		*/
	}
</script>
<!-- /building data rows with JavaScript -->