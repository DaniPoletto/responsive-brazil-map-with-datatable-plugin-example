<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Exemplo Mapa</title>

	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="js/DataTables-1.10.18/css/dataTables.bootstrap.css" rel="stylesheet">
	<link href="js/Responsive-2.2.2/css/responsive.bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="js/Buttons-1.5.2/css/buttons.dataTables.css" />
	<link rel="stylesheet" type="text/css" href="js/Buttons-1.5.2/css/buttons.bootstrap.css" />
</head>

<body>

	<div class="row">
		<div class="col-sm-5">
			<div class="card">
				<div class="card-body">
					<?php include "mapa.php"; ?>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="card">
				<div class="card-body">
					<table class="table table-striped table-responsive" id="editable" data-order='[[ 0, "desc" ]]'>
						<thead>
							<tr>
								<th>Cidade</th>
								<th>Unidades</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<input id="estado" style="display:none;" value="">

	<script src="js/jquery-2.1.1.js"></script>

	<!-- Data Tables -->
	<script src="js/DataTables-1.10.18/js/jquery.dataTables.js"></script>
	<script src="js/DataTables-1.10.18/js/dataTables.bootstrap.js"></script>

	<script src="js/Responsive-2.2.2/js/dataTables.responsive.js"></script>
	<script src="js/Responsive-2.2.2/js/responsive.bootstrap.js"></script>

	<script src="js/JSZip-2.5.0/jszip.js"></script>
	<script src="js/pdfmake-0.1.36/pdfmake.js"></script>

	<script type="text/javascript" src="js/Buttons-1.5.2/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="js/Buttons-1.5.2/js/buttons.bootstrap.js"></script>
	<script type="text/javascript" src="js/Buttons-1.5.2/js/buttons.html5.js"></script>

	<script>
		table = $('#editable').DataTable({
			processing: true,
			serverSide: true,
			responsive: true,
			searching: false,
			language: {
				url: 'js/Portuguese-Brasil.json'
			},
			ajax: {
				url: 'php/busca_unidades.php',
				type: 'post',
				data: function(d) {
					d.estado = $("#estado").val()
				}
			},
		});

		//mapa
		(function() {
			var states = document.getElementsByClassName("estado")
			for (var i = 0; i < states.length; i++) {
				states[i].onclick = function() {
					busca_unidades(this.getAttribute('code'))
				}
			}
		})();

		function busca_unidades(estado) {
			$("#estado").val(estado);
			table.ajax.reload(null, false)
		}
	</script>
</body>

</html>