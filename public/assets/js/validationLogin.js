"use strict";

function validationLogin(e) {
  // e.preventDefault();

  let warning = document.getElementById("warning");
  let email = document.getElementById("emailLogin").value;
  let password = document.getElementById("passwordLogin").value;

  if (
    !/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(
      email
    )
  ) {
    warning.innerHTML = "El correo ingresado no es válido";
  } else if (password === null || password.length < 6) {
    warning.innerHTML = "La contraseña debe tener mínimo 6 caracteres";
  } else {
    warning.innerHTML = "";
    //hacer el push a la página deseada
  }
}

function validationSignUp(e) {
  // e.preventDefault();

  let warning = document.getElementById("warningSignUp");
  let name = document.getElementById("name").value;
  let country = document.getElementById("country").value;
  let city = document.getElementById("city").value;
  let email = document.getElementById("emailSignUp").value;
  let password = document.getElementById("passwordSignUp").value;
  let rol = document.getElementById("rol").value;

  if (name === null || name.length < 6) {
    warning.innerHTML = "El campo Nombre debe tener mínimo 6 caracteres";
  } else if (country === null || country.length < 4) {
    warning.innerHTML = "El país ingresada no es válido";
  } else if (city === null || city.length < 4) {
    warning.innerHTML = "La ciudad ingresada no es válida";
  } else if (
    !/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(
      email
    )
  ) {
    warning.innerHTML = "El correo ingresado no es válido";
  } else if (password === null || password.length < 6) {
    warning.innerHTML = "La contraseña debe tener mínimo 6 caracteres";
  } else if (rol === "Rol") {
    warning.innerHTML = "Debe escoger un rol válido";
  } else {
    // warning.innerHTML = ""
    //hacer el push a la página deseada
    console.error(object);
  }
}

function registerApto() {
  // e.preventDefault();
  let ciudad = getElementById("ciudad");
  let pais = getElementById("pais");
  let direccion = getElementById("direccion");
  let habitaciones = getElementById("habitaciones");
  let valor = getElementById("valor");
  let resena = getElementById("resena");
  let imagen = getElementById("imagen");

  if (ciudad === null || city.length < 4) {
    warning.innerHTML = "La ciudad ingresada no es válida";
  } else if (pais === null || pais.length < 4) {
    warning.innerHTML = "El país ingresada no es válida";
  } else if (direccion === null || direccion.length < 10) {
    warning.innerHTML = "La dirección ingresada no es válida";
  } else if (habitaciones === null || habitaciones === "0") {
    warning.innerHTML = "El número de habitaciones ingresadas no es válido";
  }else if (valor === null) {
    warning.innerHTML = "El valor ingresado no es válido";
  }
}
