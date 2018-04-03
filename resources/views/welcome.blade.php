<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
	 crossorigin="anonymous">

	<title>Catálogo de Productos</title>
</head>
<body>
	<div class="container" id="app">
		<div class="row">
			<div class="col-8">
				<h1>Productos</h1>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nombre</th>
							<th scope="col">Cantidad</th>
							<th scope="col">Precio</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="item in list.data">
							<th scope="row">@{{ item.producto_id }}</th>
							<td>@{{ item.nombre }}</td>
							<td>@{{ item.cantidad }}</td>
							<td>@{{ item.precio }}</td>
						</tr>
					</tbody>
				</table>
				<nav v-if="pagination.last_page>1" aria-label="Page navigation example">
					<ul class="pagination justify-content-center">
						<li v-if="pagination.current_page==1" class="page-item disabled">
							<a class="page-link" href="#" tabindex="-1">Previous</a>
						</li>
						<li v-else class="page-item">
							<a class="page-link" href="#" tabindex="-1" @click="getProductos(pagination.prev_page_url)">Previous</a>
						</li>

						<li v-for="page in pagination.last_page" v-if="pagination.current_page==page" class="page-item active">
							<a class="page-link" href="#">@{{ page }}</a>
						</li>
						<li v-else class="page-item">
							<a class="page-link" href="#" @click="getProductos(pagination.path+'?page='+page)">@{{ page }}</a>
						</li>
						<li v-if="pagination.current_page==pagination.last_page" class="page-item disabled">
							<a class="page-link" href="#">Next</a>
						</li>
						<li v-else class="page-item">
							<a class="page-link" href="#" @click="getProductos(pagination.next_page_url)">Next</a>
						</li>
					</ul>
				</nav>
			</div>
			<div class="col-4">
				<h1>Data</h1>
				<pre>
                    @{{ list }}
                </pre>
			</div>
		</div>
	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="{{ asset('js/app.js') }}"></script>

</body>

</html>