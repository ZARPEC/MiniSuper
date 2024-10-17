// Cargar el archivo JSON
fetch("s/../Data/Departamentos.json")
  .then((response) => {
    if (!response.ok) {
      throw new Error("Error en la carga del JSON");
    }
    return response.json();
  })
  .then((data) => {
    // Cargar los departamentos en el select
    const departamentoSelect = document.getElementById("departamento");
    data.departamentos.forEach((departamento) => {
      let option = document.createElement("option");
      option.value = departamento.id;
      option.textContent = departamento.nombre;
      departamentoSelect.appendChild(option);
    });

    // Actualizar los municipios cuando se selecciona un departamento
    departamentoSelect.addEventListener("change", function () {
      const municipioSelect = document.getElementById("municipio");
      municipioSelect.innerHTML =
        '<option value="" disabled selected>Seleccione un municipio</option>'; // Limpiar municipios
      const selectedDepartamentoId = this.value;

      // Encontrar el departamento seleccionado
      const selectedDepartamento = data.departamentos.find(
        (departamento) => departamento.id == selectedDepartamentoId
      );

      // Cargar los municipios del departamento seleccionado
      selectedDepartamento.municipios.forEach((municipio) => {
        let option = document.createElement("option");
        option.value = municipio.id;
        option.textContent = municipio.nombre;
        municipioSelect.appendChild(option);
      });
    });
  })
  .catch((error) => {
    console.error("Error al cargar el archivo JSON:", error);
  });
