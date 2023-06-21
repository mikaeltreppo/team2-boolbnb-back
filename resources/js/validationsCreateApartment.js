document.addEventListener("DOMContentLoaded", function () {
    const inputTitle = document.getElementById("title");
    const titleError = document.getElementById("titleError");
    inputTitle.addEventListener("input", function () {
        if (inputTitle.validity.valid) {
            titleError.textContent = "";

        } else if (inputTitle.value.trim() === "") {
            titleError.textContent = "Nome mancante";
        } else {
            titleError.textContent = "Inserisci un nome valido.";
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const priceName = document.getElementById("price");
    const priceError = document.getElementById("priceError");
    const regex = /^(\d+|\d+,\d{1,2}|\d+\.\d{1,2})$/;
    priceName.addEventListener("input", function () {
        if (!regex.test(priceName.value)) {
            if (priceName.value.includes(",")) {
                priceError.textContent = "Inserire il punto invece della virgola";
            } else if (priceName.value.split(".").length > 2) {
                priceError.textContent = "Inserire al massimo due decimali";
            } else {
                priceError.textContent = "Non è un numero valido";
            }
        } else {
            priceError.textContent = "";
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const inputAddress = document.getElementById("address");
    const addressError = document.getElementById("addressError");
    const regex = /[a-zA-Z]/; // Espressione regolare per almeno una lettera
    inputAddress.addEventListener("input", function () {
        const addressValue = inputAddress.value.trim();

        if (addressValue === "") {
            addressError.textContent = "Indirizzo mancante";
        } else {
            addressError.textContent = "";
        }
    });
});

