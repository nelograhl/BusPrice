
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
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Variables
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<li style="display:none;"><a class="dropdown-item" href="/registrosp">Registro de Pasajeros</a></li>
							<li style="display:none;"><a class="dropdown-item" href="/buses">Buses</a></li>
							<li style="display:none;"><a class="dropdown-item" href="/tipomant">Mantenimientos</a></li>
							<li ><a class="dropdown-item" href="/tramos">Tramos</a></li>							
							<li><a class="dropdown-item" href="/insumos">Insumos Básicos</a></li>
							<li><a class="dropdown-item" href="/coeficientes">Coeficientes de Consumo</a></li>
							<li style="display:none;"><a class="dropdown-item" href="/config">Configuración Buses</a></li>
							<li style="display:none;"><a class="dropdown-item" href="/datosoperacionales">Datos Operacionales</a></li>
							<li><a class="dropdown-item" href="/tasasimpuestos">Tasas e Impuestos</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Resúmenes
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">								
							<li><router-link class="dropdown-item" to="/resumenes/costos">Resumen de costos totales</router-link></li>
							<li><a class="dropdown-item" href="/costos">Resumen de costos variables</a></li>
							<li  style="display:none;" ><a class="dropdown-item" href="#">Costo Fijo</a></li>
						</ul>
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