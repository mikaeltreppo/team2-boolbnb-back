
document.addEventListener("DOMContentLoaded", function() {
  const inputName = document.getElementById("name");
  const nameError = document.getElementById("nameError");
  inputName.addEventListener("input", function() {
    if (inputName.validity.valid) {
      nameError.textContent = "";

    } else {
      nameError.textContent = "Inserisci un nome valido.";
    }
  });
});


document.addEventListener("DOMContentLoaded", function() {
    const inputName = document.getElementById("lastname");
    const nameError = document.getElementById("lastnamenameError");
    inputName.addEventListener("input", function() {
      if (inputName.validity.valid) {
        lastnameError.textContent = "";
  
      } else {
        lastnameError.textContent = "Inserisci un cognome valido.";
      }
    });
  });

  document.addEventListener("DOMContentLoaded", function() {
    const inputName = document.getElementById("phone");
    const phoneError = document.getElementById("phoneError");
    inputName.addEventListener("input", function() {
      if (inputName.validity.valid) {
        phoneError.textContent = "";
  
      } else {
        phoneError.textContent = "Inserisci un numero di telefono valido.";
      }
    });
  });

  document.addEventListener("DOMContentLoaded", function() {
    const inputName = document.getElementById("email");
    const emailError = document.getElementById("emailError");
    inputName.addEventListener("input", function() {
      if (inputName.validity.valid) {
        emailError.textContent = "";
  
      } else {
        emailError.textContent = "Inserisci una mail valida.";
      }
    });
  });