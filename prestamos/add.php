<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../public/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $json = $_POST['carrito'] ?? '[]';
    $carritoArray = json_decode($json, true);
    if ($carritoArray === null && json_last_error() !== JSON_ERROR_NONE) {
        $msgError = json_last_error_msg();
        echo "<script>alert('Error al procesar el carrito: $msgError'); history.back();</script>";
        exit();
    }
    if (count($carritoArray) === 0) {
        echo "<script>alert('Debes agregar al menos una herramienta al carrito.'); history.back();</script>";
        exit();
    }

    // Aquí puedes procesar $carritoArray y los demás campos del formulario

    echo "<script>alert('Préstamo (y carrito) agregado correctamente (simulado)'); window.location='list.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Agregar Préstamo</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <style>
      table { border-collapse: collapse; width: 100%; }
      table, th, td { border: 1px solid #999; }
      th, td { padding: 8px; text-align: center; }
      .btn { padding: 6px 12px; cursor: pointer; }
      input[type="number"] { width: 60px; }

    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      border: 1px solid #666;
      padding: 5px;
      text-align: left;
    }
    .btn {
      padding: 4px 8px;
      cursor: pointer;
    }
    .label-stock {
      font-weight: bold;
      color: green;
    }
    .filtros {
      margin-bottom: 10px;
    }
    .filtros input, .filtros select {
      margin-right: 5px;
    }

    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container">
        <h2>Agregar Préstamo</h2>
        <form method="post" onsubmit="return prepararEnvioCarrito();">
            <div class="form-group">
                <label for="usuario">Usuario :</label>
                <input type="text" name="usuario" id="usuario" required>
            </div>
            <div class="form-group">
                <label for="profesor">Profesor responsable :</label>
                <input type="text" name="profesor" id="profesor" required>
            </div>
            <div class="form-group">
                <label for="alumno">Alumno responsable :</label>
                <input type="text" name="alumno" id="alumno" required>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha :</label>
                <input type="date" name="fecha" id="fecha" required>
            </div>
            <div class="form-group">
                <label for="curso">Curso :</label>
                <input type="number" name="curso" id="curso" required>
            </div>
            <div class="form-group">
                <label for="division">División :</label>
                <input type="number" name="division" id="division" required>
            </div>
            <div class="form-group">
                <label for="comision">Comisión :</label>
                <input type="number" name="comision" id="comision" required>
            </div>

            <div>
                <label>Turno :</label>
                <select name="turno" id="selectTurno">
                  <option value="Mañana">Mañana</option>
                  <option value="Tarde">Tarde</option>
                  <option value="Vespertino">Vespertino</option>
                </select>
            </div>
            <br>

            <hr>

        

            <!-- Tabla de control con las 3 herramientas fijas -->
             <h3>Agregar herramientas al carrito</h3>

  <div class="filtros">
    <label for="filtroCategoria">Filtrar por categoría:</label>
    <select id="filtroCategoria">
      <option value="">Todas</option>
      <option value="Seguridad">Seguridad</option>
      <option value="Eléctricas">Eléctricas</option>
      <option value="Manuales">Manuales</option>
    </select>

    <label for="buscadorNombre">Buscar herramienta:</label>
    <input type="text" id="buscadorNombre" placeholder="Escribe el nombre">
  </div>

  <!-- Tabla de control con las herramientas disponibles (ahora con más datos) -->
  <table id="tablaControlHerramientas">
    <thead>
      <tr>
        <th>ID</th>
        <th>Herramienta</th>
        <th>Categoría</th>
        <th>Stock disponible</th>
        <th>Acción</th>
      </tr>
    </thead>
    <tbody>
      <!-- Filas con atributos data-... para facilitar filtros y búsqueda -->
      <tr data-id="1" data-producto="Martillo" data-categoria="Manuales" data-stock="10">
        <td>1</td><td>Martillo</td><td>Manuales</td><td><span class="label-stock">10</span></td>
        <td><button type="button" class="btn btnAñadirControl">Añadir</button></td>
      </tr>
      <tr data-id="2" data-producto="Pinza" data-categoria="Manuales" data-stock="5">
        <td>2</td><td>Pinza</td><td>Manuales</td><td><span class="label-stock">5</span></td>
        <td><button type="button" class="btn btnAñadirControl">Añadir</button></td>
      </tr>
      <tr data-id="3" data-producto="Casco" data-categoria="Seguridad" data-stock="8">
        <td>3</td><td>Casco</td><td>Seguridad</td><td><span class="label-stock">8</span></td>
        <td><button type="button" class="btn btnAñadirControl">Añadir</button></td>
      </tr>
      <tr data-id="4" data-producto="Taladro" data-categoria="Eléctricas" data-stock="3">
        <td>4</td><td>Taladro</td><td>Eléctricas</td><td><span class="label-stock">3</span></td>
        <td><button type="button" class="btn btnAñadirControl">Añadir</button></td>
      </tr>
    </tbody>
  </table>

  <br>

  <!-- Carrito: sin columna cantidad (porque la “cantidad” es el stock) -->
  <form onsubmit="return prepararEnvioCarrito()">
    <table id="tablaCarrito">
      <thead>
        <tr>
          <th>ID</th>
          <th>Herramienta</th>
          <th>Categoría</th>
          <th>Stock disponible</th>
          <th>Acción</th>
        </tr>
      </thead>
      <tbody>
        <!-- filas generadas por JavaScript -->
      </tbody>
    </table>

    <p>Total de herramientas añadidas: <span id="contadorTotal">0</span></p>

    <input type="hidden" name="carrito" id="inputCarritoJson" value="">

    <button type="submit">Crear préstamo</button>
  </form>
  <br>
  <a href="list.php" class="back-btn">Volver</a>

  <script>
    const filasControl = document.querySelectorAll("#tablaControlHerramientas tbody tr");
    const tablaCarritoBody = document.querySelector("#tablaCarrito tbody");
    const contadorTotalSpan = document.getElementById("contadorTotal");
    const inputCarritoJson = document.getElementById("inputCarritoJson");
    const filtroCategoria = document.getElementById("filtroCategoria");
    const buscadorNombre = document.getElementById("buscadorNombre");

    let carrito = [];

    // Función que actualiza la tabla del carrito
    function actualizarCarritoTabla() {
      tablaCarritoBody.innerHTML = "";
      carrito.forEach((item, idx) => {
        const tr = document.createElement("tr");

        const tdId = document.createElement("td");
        tdId.textContent = item.id;
        tr.appendChild(tdId);

        const tdProd = document.createElement("td");
        tdProd.textContent = item.producto;
        tr.appendChild(tdProd);

        const tdCat = document.createElement("td");
        tdCat.textContent = item.categoria;
        tr.appendChild(tdCat);

        const tdStock = document.createElement("td");
        tdStock.textContent = item.stock;
        tr.appendChild(tdStock);

        const tdAcc = document.createElement("td");
        const btnEliminar = document.createElement("button");
        btnEliminar.type = "button";
        btnEliminar.textContent = "Eliminar";
        btnEliminar.classList.add("btn");
        btnEliminar.addEventListener("click", () => {
          carrito.splice(idx, 1);
          actualizarCarritoTabla();
          actualizarContadorYHidden();
        });
        tdAcc.appendChild(btnEliminar);
        tr.appendChild(tdAcc);

        tablaCarritoBody.appendChild(tr);
      });
    }

    function actualizarContadorYHidden() {
      let total = carrito.length;
      contadorTotalSpan.textContent = total;
      inputCarritoJson.value = JSON.stringify(carrito);
    }

    // Filtrar las filas de control según categoría y búsqueda por nombre
    function aplicarFiltros() {
      const catFiltro = filtroCategoria.value.toLowerCase();
      const textoBusqueda = buscadorNombre.value.trim().toLowerCase();
      filasControl.forEach(fila => {
        const cat = fila.getAttribute("data-categoria").toLowerCase();
        const nombre = fila.getAttribute("data-producto").toLowerCase();
        let mostrar = true;
        if (catFiltro && cat !== catFiltro) {
          mostrar = false;
        }
        if (textoBusqueda && !nombre.includes(textoBusqueda)) {
          mostrar = false;
        }
        fila.style.display = mostrar ? "" : "none";
      });
    }

    // Al cambiar filtro o búsqueda, reaplicar
    filtroCategoria.addEventListener("change", aplicarFiltros);
    buscadorNombre.addEventListener("input", aplicarFiltros);

    filasControl.forEach(fila => {
      const btn = fila.querySelector(".btnAñadirControl");
      btn.addEventListener("click", () => {
        const id = fila.getAttribute("data-id");
        const producto = fila.getAttribute("data-producto");
        const categoria = fila.getAttribute("data-categoria");
        const stock = parseInt(fila.getAttribute("data-stock"));

        // Ver si ya existe en el carrito
        const existe = carrito.find(it => it.id === id);
        if (!existe) {
          // Agregar con la información de stock
          carrito.push({
            id: id,
            producto: producto,
            categoria: categoria,
            stock: stock
          });
        } else {
          alert("La herramienta ya está en el carrito.");
        }
        actualizarCarritoTabla();
        actualizarContadorYHidden();
      });
    });

    function prepararEnvioCarrito() {
      actualizarContadorYHidden();
      if (carrito.length === 0) {
        alert("Debes agregar al menos una herramienta al carrito.");
        return false;
      }
      return true;
    }

    // Inicialmente aplicar filtros (para mostrar todas)
    aplicarFiltros();
    </script>
</body>
</html>
