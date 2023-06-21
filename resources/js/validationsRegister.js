
document.addEventListener("DOMContentLoaded", function () {
  const inputName = document.getElementById("name");
  const nameError = document.getElementById("nameError");
  const regex = /^[a-zA-ZÀ-ÿ\s']+$/; // Espressione regolare per lettere e lettere accentate

  inputName.addEventListener("input", function () {
    const nameValue = inputName.value.trim();

    if (nameValue === "") {
      nameError.textContent = "Il campo nome è richiesto";
    } else if (!regex.test(nameValue)) {
      nameError.textContent = "Inserisci un nome valido";
    } else {
      nameError.textContent = "";
    }
  });
});



document.addEventListener("DOMContentLoaded", function () {
  const inputLastname = document.getElementById("lastname");
  const lastnameError = document.getElementById("lastnameError");
  const regex = /^[a-zA-ZÀ-ÿ\s']+$/; // Espressione regolare per lettere e lettere accentate

  inputLastname.addEventListener("input", function () {
    const lastnameValue = inputLastname.value.trim();

    if (lastnameValue === "") {
      lastnameError.textContent = "Il campo cognome è richiesto";
    } else if (!regex.test(lastnameValue)) {
      lastnameError.textContent = "Inserisci un cognome valido";
    } else {
      lastnameError.textContent = "";
    }
  });
});


document.addEventListener("DOMContentLoaded", function () {
  const inputName = document.getElementById("phone");
  const phoneError = document.getElementById("phoneError");
  inputName.addEventListener("input", function () {
    const numberValue = inputName.value;
    if (numberValue.length === 0) {
      phoneError.textContent = "Numero di telefono obbligatorio";
    } else if (!/^[0-9]+$/.test(numberValue)) {
      phoneError.textContent = "Sono consentiti solo numeri";
    } else if (numberValue.length < 10) {
      phoneError.textContent = "Numero di telefono troppo corto (minimo 10)";
    } else {
      phoneError.textContent = "";
    }
  });
});



document.addEventListener("DOMContentLoaded", function () {
  const inputName = document.getElementById("email");
  const emailError = document.getElementById("emailError");
  const regex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
  inputName.addEventListener("input", function () {
    const emailValue = inputName.value.trim();

    if (emailValue === "") {
      emailError.textContent = "Il campo email è obbligatorio";
    } else if (!regex.test(emailValue)) {
      emailError.textContent = "Inserire un indirizzo email valido";
    } else {
      emailError.textContent = "";
    }
  });
});
