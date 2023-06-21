document.addEventListener("DOMContentLoaded", function () {
    const inputTitle = document.getElementById("title");
    const titleError = document.getElementById("titleError");
    const forbiddenCharacters = /[<>!@#$%^&*()+=[\]{}|\\]/; // Caratteri pericolosi
    const minLength = 5;
    const maxLength = 255;

    inputTitle.addEventListener("input", function () {
        const titleValue = inputTitle.value.trim();

        if (inputTitle.validity.valid && titleValue.length >= minLength && titleValue.length <= maxLength && !forbiddenCharacters.test(titleValue)) {
            titleError.textContent = "";
        } else if (titleValue === "") {
            titleError.textContent = "Nome mancante";
        } else if (titleValue.length < minLength) {
            titleError.textContent = "Il titolo deve contenere almeno " + minLength + " caratteri";
        } else if (titleValue.length > maxLength) {
            titleError.textContent = "Il titolo deve contenere al massimo " + maxLength + " caratteri";
        } else {
            titleError.textContent = "Il titolo contiene caratteri non validi.";
        }
    });
});


document.addEventListener("DOMContentLoaded", function () {
    const priceName = document.getElementById("price");
    const priceError = document.getElementById("priceError");
    const regex = /^\d+(\.\d{1,2})?$/;

    priceName.addEventListener("input", function () {
        const priceValue = priceName.value.trim();

        if (!regex.test(priceValue)) {
            if (priceValue.includes(",")) {
                priceError.textContent = "Inserire il punto al posto della virgola.";
            } else {
                priceError.textContent = "Inserire un prezzo valido.";
            }
        } else if (priceValue.includes(".") && priceValue.split(".")[1].length > 2) {
            priceError.textContent = "Massimo 2 decimali consentiti";
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