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

document.addEventListener("DOMContentLoaded", function () {
    const inputDescription = document.getElementById("description");
    const descriptionError = document.getElementById("descriptionError");
    inputDescription.addEventListener("input", function () {
        const descriptionValue = inputDescription.value.trim();

        if (descriptionValue === "") {
            descriptionError.textContent = "Descrizione mancante";
        } else if (descriptionValue.length > 5000) {
            descriptionError.textContent = "La descrizione deve contenere al massimo 5000 caratteri";
        } else {
            descriptionError.textContent = "";
        }
    });
});


document.addEventListener("DOMContentLoaded", function () {
    const inputBedrooms = document.getElementById("bedrooms");
    const bedroomsError = document.getElementById("bedroomsError");
    inputBedrooms.addEventListener("input", function () {
        const bedroomsValue = inputBedrooms.value.trim();

        if (bedroomsValue === "") {
            bedroomsError.textContent = "Campo vuoto";
        } else if (
            !/^[1-9][0-9]*$/.test(bedroomsValue) ||
            parseFloat(bedroomsValue) !== parseInt(bedroomsValue, 10)
        ) {
            bedroomsError.textContent = "Inserire un numero intero positivo";
        } else {
            bedroomsError.textContent = "";
        }
    });
});



document.addEventListener("DOMContentLoaded", function () {
    const inputBeds = document.getElementById("beds");
    const bedsError = document.getElementById("bedsError");
    inputBeds.addEventListener("input", function () {
        const bedsValue = inputBeds.value.trim();

        if (bedsValue === "") {
            bedsError.textContent = "Campo vuoto";
        } else if (
            !/^[1-9][0-9]*$/.test(bedsValue) ||
            parseFloat(bedsValue) !== parseInt(bedsValue, 10)
        ) {
            bedsError.textContent = "Inserire un numero intero positivo";
        } else {
            bedsError.textContent = "";
        }
    });
});



document.addEventListener("DOMContentLoaded", function () {
    const inputBathrooms = document.getElementById("bathrooms");
    const bathroomsError = document.getElementById("bathroomsError");
    inputBathrooms.addEventListener("input", function () {
        const bathroomsValue = inputBathrooms.value.trim();

        if (bathroomsValue === "") {
            bathroomsError.textContent = "Campo vuoto";
        } else if (
            !/^[1-9][0-9]*$/.test(bathroomsValue) ||
            parseFloat(bathroomsValue) !== parseInt(bathroomsValue, 10)
        ) {
            bathroomsError.textContent = "Inserire un numero intero positivo";
        } else {
            bathroomsError.textContent = "";
        }
    });
});



document.addEventListener("DOMContentLoaded", function () {
    const inputSize = document.getElementById("size_m2");
    const sizeError = document.getElementById("sizeError");
    inputSize.addEventListener("input", function () {
        const sizeValue = inputSize.value.trim();

        if (sizeValue === "") {
            sizeError.textContent = "Campo vuoto";
        } else if (
            !/^[1-9][0-9]*$/.test(sizeValue) ||
            parseFloat(sizeValue) !== parseInt(sizeValue, 10)
        ) {
            sizeError.textContent = "Inserire un numero intero positivo";
        } else {
            sizeError.textContent = "";
        }
    });
});