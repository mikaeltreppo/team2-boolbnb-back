function initializeAddressAutocomplete() {
    // Opzioni per il suggerimento dell'indirizzo
    var autocompleteOptions = {
        key: 'ZPskuspkrrcmchd9ut4twltuw96h5bWH', // Sostituisci con la tua chiave API TomTom
        limit: 6, // Limite dei suggerimenti da visualizzare
    };

    // Creazione dell'oggetto TomTom SearchAPI
    var searchApi = tt.services.createSearchService(autocompleteOptions);

    // Ottenere l'elemento di input dell'indirizzo
    var addressInput = document.getElementById('address-autocomplete');

    // Inizializzazione del suggerimento dell'indirizzo
    var addressAutocomplete = new tt.plugins.Autocomplete({
        autoselect: true, // Auto-seleziona il suggerimento quando l'utente lo sceglie
        limit: autocompleteOptions.limit, // Limite dei suggerimenti da visualizzare
    });

    // Aggiunta del suggerimento dell'indirizzo all'input
    addressAutocomplete.addTo(addressInput);

    // Gestione dell'evento di selezione del suggerimento
    addressAutocomplete.on('change', function (event) {
        if (event.data) {
            // Indirizzo selezionato dall'utente
            var selectedAddress = event.data.result;

            // Aggiorna il valore dell'input con l'indirizzo completo
            addressInput.value = selectedAddress.address.freeformAddress;
        }
    });
}

// Esegui la funzione di inizializzazione del suggerimento dell'indirizzo dopo il caricamento della pagina
document.addEventListener('DOMContentLoaded', function () {
    initializeAddressAutocomplete();
});