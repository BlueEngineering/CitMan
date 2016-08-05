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
					<?= $work->title; ?>
				</td>
				<td>
					<!-- Autoren einzeln als Array und dann im View konkatienieren via , und Name mit Link unterlegt -->
					<?= $work->authors; ?>
				</td>
				<td>
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