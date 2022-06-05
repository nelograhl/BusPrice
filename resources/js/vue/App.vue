
<template>
	<main>
		
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
			<div class="container-fluid text-light">
				<a class="navbar-brand">BusPrice</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
					<li class="nav-item">
						<router-link class="nav-link active" aria-current="page" to="/">Home</router-link>
					</li>
					<li class="nav-item">
						<router-link class="nav-link" to="/registrosp">Registro de Pasajeros</router-link>
					</li>
					<li class="nav-item">
						<router-link class="nav-link" to="/buses">Buses</router-link>
					</li>
					<li class="nav-item">
						<router-link class="nav-link" to="/tipomant">Mantenimientos</router-link>
					</li>
					<li class="nav-item">
						<router-link class="nav-link" to="/tramos">Tramos</router-link>
					</li>
					<li class="nav-item">
						<router-link class="nav-link" to="/coeficientes">Coeficientes de Consumo</router-link>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Dropdown link
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<li><a class="dropdown-item" href="#">Action</a></li>
							<li><a class="dropdown-item" href="#">Another action</a></li>
							<li><a class="dropdown-item" href="#">Something else here</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<router-link class="nav-link" to="/config">Configuración</router-link>
					</li>
				</ul>
				</div>
			</div>
		</nav>
		<div>
			<router-view></router-view>
		</div>
	</main>
</template>

<script>

import List from "./components/List"

export default {
	components: {
		List
	}
}
</script>