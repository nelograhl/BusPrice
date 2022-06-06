
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
					<li class="nav-item">
						<router-link class="nav-link" to="/tasasimpuestos">Tasas e Impuestos</router-link>
					</li>
					<li class="nav-item">
						<router-link class="nav-link" to="/costos">Costos Variables</router-link>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Configuración
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<li><a class="dropdown-item" href="/datosoperacionales">Datos Operacionales</a></li>
							<li><a class="dropdown-item" href="/costos">Costos Variables</a></li>
							<li><a class="dropdown-item" href="/insumos">Insumos Básicos</a></li>
							<li><router-link class="dropdown-item" to="/resumenes/costos">Tabla de Costos</router-link></li>
							<li><a class="dropdown-item" href="#">Datos Operacionales</a></li>
							<li><a class="dropdown-item" href="#">Costos Variables</a></li>
							<li><a class="dropdown-item" href="#">Costo Fijo</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<router-link class="nav-link" to="/config">Configuración</router-link>
					</li>
					<li class="nav-item">
						<router-link class="nav-link" to="/config">Calculo Tarifa</router-link>
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