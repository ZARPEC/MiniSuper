let carrito = JSON.parse(sessionStorage.getItem("carrito")) || [];

// Función para guardar el carrito en localStorage
function guardarCarrito() {
  sessionStorage.setItem("carrito", JSON.stringify(carrito));
}


function mostrarCarrito() {
  const cartItems = document.getElementById("cart-items");
  cartItems.innerHTML = "";
  let subtotal = 0;

  carrito.forEach((item, index) => {
    const itemSubtotal = item.precio * item.cantidad;
    subtotal += itemSubtotal;

    cartItems.innerHTML += `
                <tr>
                    <td>${item.nombre}</td>
                    <td><input type="number" class="form-control" value="${
                      item.cantidad
                    }" min="1" onchange="actualizarCantidad(${index}, this.value)" style="width: 80px;"></td>
                    <td>Q${item.precio.toFixed(2)}</td>
                    <td>Q${itemSubtotal.toFixed(2)}</td>
                    <td><button class="btn btn-danger btn-sm" onclick="eliminarDelCarrito(${index})">Eliminar</button></td>
                </tr>
            `;
  });

  const impuestos = subtotal * 0.12;
  const total = subtotal;

  document.getElementById("subtotal").textContent = `Q${subtotal.toFixed(2)}`;
  document.getElementById("total").textContent = `Q${total.toFixed(2)}`;
  hiddenProduct();
}


// Función para agregar un producto al carrito
function agregarAlCarrito(producto) {
  // Verificar si el producto ya existe en el carrito
  const existeProducto = carrito.find((item) => item.id === producto.id);

  if (existeProducto) {
    // Si el producto ya existe, simplemente incrementamos la cantidad
    existeProducto.cantidad += 1;
  } else {
    // Si el producto no está en el carrito, lo añadimos
    carrito.push({ ...producto });
    alert("Se Agrego al carrito el porducto " + producto.nombre);
  }
  guardarCarrito();
  mostrarCarrito();
  // Mostrar el carrito en consola (puedes actualizar el HTML también)
  console.log(carrito);
}

// Función para actualizar la cantidad de un producto
function actualizarCantidad(index, nuevaCantidad) {
  carrito[index].cantidad = parseInt(nuevaCantidad);
  guardarCarrito();
  mostrarCarrito();
}

// Función para eliminar un producto del carrito
function eliminarDelCarrito(index) {
  carrito.splice(index, 1);
  guardarCarrito();
  mostrarCarrito();
}

function vaciarCarrito() {
  sessionStorage.removeItem("carrito"); // Vaciar el carrito en sessionStorage
}

// Función para agregar los productos como campos ocultos al formulario
function hiddenProduct() {
  const form = document.getElementById("checkout-form");

  // Crear un div que encierre todos los campos ocultos
  let hiddenFieldsDiv = document.getElementById("hidden-products-fields");

  if (!hiddenFieldsDiv) {
    // Si no existe, crear el div
    hiddenFieldsDiv = document.createElement("div");
    hiddenFieldsDiv.id = "hidden-products-fields"; // Asignar el ID al div
    form.appendChild(hiddenFieldsDiv); // Agregar el div al formulario
  }
  // Limpiar el div en caso de que ya haya sido llenado anteriormente
  hiddenFieldsDiv.innerHTML = "";

  carrito.forEach((item, index) => {
    // Campos ocultos para cada producto
    let inputIdProducto = document.createElement("input");
    inputIdProducto.type = "hidden";
    inputIdProducto.name = `productos[${index}][id]`;
    inputIdProducto.value = item.id;
    hiddenFieldsDiv.appendChild(inputIdProducto);

    let inputCantidad = document.createElement("input");
    inputCantidad.type = "hidden";
    inputCantidad.name = `productos[${index}][cantidad]`;
    inputCantidad.value = item.cantidad;
    hiddenFieldsDiv.appendChild(inputCantidad);

    let inputPrecioUnitario = document.createElement("input");
    inputPrecioUnitario.type = "hidden";
    inputPrecioUnitario.name = `productos[${index}][precio]`;
    inputPrecioUnitario.value = item.precio;
    hiddenFieldsDiv.appendChild(inputPrecioUnitario);
  });

  // Agregar el div con los campos ocultos al formulario
  form.appendChild(hiddenFieldsDiv);
}

// Cargar el carrito al cargar la página
document.addEventListener("DOMContentLoaded", mostrarCarrito);
