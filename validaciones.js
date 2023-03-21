function consulta() {//Borrar-BAja
  

    if (confirm("¿Está seguro de que desea continuar Con La Baja?")) {
      console.log("Delete true");
      miFormulario.submit();
    } else {
      console.log("false");

      const miFormulario = document.getElementById("miFormulario");
      miFormulario.addEventListener("submit", function (event) {
        event.preventDefault();
        location.reload();
      });
    }
}

function consulta2() {//Edicion

  
  if (validar_datos()) {
    console.log("true edicion");

    if (confirm("¿Está seguro de que desea realizar la edicion?")) {
      console.log("Edicion true");
      miFormulario.submit();
    } else {
      console.log("false");

      const miFormulario = document.getElementById("miFormulario");
      miFormulario.addEventListener("submit", function (event) {
        event.preventDefault();
        location.reload();
      });
    }
  } else {
    console.log("false edicion");

    const miFormulario = document.getElementById("miFormulario");
    miFormulario.addEventListener("submit", function (event) {
      event.preventDefault();
      location.reload();
    });
  }
}

function consulta3() {
    //Edicion
  
    if (validar_datos()) {
      console.log("true Alta");
  
      if (confirm("¿Está seguro de que desea realizar el alta?")) {
        console.log("Edicion true");
        miFormulario.submit();
      } else {
        console.log("false");
  
        const miFormulario = document.getElementById("miFormulario");
        miFormulario.addEventListener("submit", function (event) {
          event.preventDefault();
          location.reload();
        });
      }
    } else {
      console.log("false Alta");
  
      const miFormulario = document.getElementById("miFormulario");
      miFormulario.addEventListener("submit", function (event) {
        event.preventDefault();
        location.reload();
      });
    }
  }
  function limpiar() {
    document.getElementById("nombre").value = "";
    document.getElementById("apellido").value = "";
    document.getElementById("dni").value = "";
    document.getElementById("carrera").value = "";
}
  
function validar_datos() {

  var nombre = document.getElementById("nombre").value;
  var apellido = document.getElementById("apellido").value;
  var dni = document.getElementById("dni").value;
  var carrera = document.getElementById("carrera").value;

  // Validar campos vacíos
  if (
    nombre.trim() === "" ||
    apellido.trim() === "" ||
    dni.trim() === "" ||
    carrera.trim() === ""
  ) {
    alert("Todos los campos son requeridos.");
    return false;
  }

  if (
    !/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(nombre) ||
    !/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(apellido)
  ) {
    alert("El nombre y el apellido solo pueden contener letras y espacios.");
    return false;
  }

  if (dni.length != 8) {
    alert("El DNI debe tener 8 dígitos.");
    return false;
  }

  return true;
}

function limpiar() {
    
    document.getElementById("nombre").value = "";
    document.getElementById("apellido").value = "";
    document.getElementById("dni").value = "";
    document.getElementById("carrera").value = "";
}