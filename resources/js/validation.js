const btnSubmitRegister = document.getElementById("btn-submit-plate-register");

function checkLength(string, length = 1, max = false) {
    if (max) {
        return string.length === length;
    } else {
        return string.length >= length;
    }
}

if (btnSubmitRegister) {
    btnSubmitRegister.addEventListener("click", (event) => {
        event.preventDefault();

        const form = document.getElementById("register-form");

        const errorDiv = document.getElementById("error");
        const errorMessage = document.getElementById("error-message");

        errorDiv.classList.add("d-none");
        errorMessage.innerHTML = "";

        const inputs = form.elements;
        const errors = [];

        if (!checkLength(inputs.restaurant_name.value.trim())) {
            errors.push("Il nome del ristorante è obbligatorio");
        }

        if (
            !inputs.email.value.match(
                /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            )
        ) {
            errors.push("La mail è obbligatoria e deve essere una mail corretta");
        }

        if (!checkLength(inputs.password.value.trim(), 8)) {
            errors.push("La password è obbligatorio e deve essere almeno 8 caratteri");
        }

        if (!checkLength(inputs.password_confirmation.value.trim(), 8)) {
            errors.push("La password va confermata");
        }

        if (inputs.password.value.trim() !== inputs.password_confirmation.value.trim()) {
            errors.push("Le password devono corrispondere");
        }

        if (!checkLength(inputs.restaurant_address.value.trim())) {
            errors.push("L'indirizzo è obbligatorio");
        }

        if (!checkLength(inputs.vat_number.value.trim(), 11, true)) {
            errors.push("La Partita Iva è obbligatoria e di 11 caratteri");
        }

        if (inputs.restaurant_image.value == "") {
            errors.push("Devi caricare una immagine per il tuo ristorante");
        }

        const checkboxes = document.querySelectorAll('input[type="checkbox"]');

        if (!Array.prototype.slice.call(checkboxes).some((x) => x.checked)) {
            errors.push("Almeno una tipologia deve essere selezionata");
        }

        if (errors.length) {
            errorMessage.innerHTML += "<ul>";
            errors.forEach((e) => {
                errorMessage.innerHTML += `<li>${e}</li>`;
            });
            errorMessage.innerHTML += "</ul>";

            errorDiv.classList.remove("d-none");

            window.scrollTo({ top: 0, behavior: "smooth" });
        } else {
            form.submit();
        }
    });
}


// Funzione che permette la validazione dei form CREATE e EDIT di PLATES.

function handlePlateFormSubmit(formId) {
    const form = document.getElementById(formId);

    if (!form) {
        return; // Il form non esiste, usciamo dalla funzione
    }

    const errorDiv = document.getElementById("error");
    const errorMessage = document.getElementById("error-message");

    errorDiv.classList.add("d-none");
    errorMessage.innerHTML = "";

    const inputs = form.elements;
    const errors = [];

    if (!checkLength(inputs.plate_name.value.trim())) {
        errors.push("Il nome è obbligatorio");
    }

    if (!checkLength(inputs.ingredients.value.trim())) {
        errors.push("Devi scrivere gli ingredienti");
    }

    if (!inputs.price.value || isNaN(inputs.price.value)) {
        errors.push("Il prezzo è obbligatorio");
    } else if (parseFloat(inputs.price.value) < 0) {
        errors.push("Il prezzo deve essere positivo");
    }

    if (!checkLength(inputs.description.value.trim())) {
        errors.push("Devi scrivere la descrizione del piatto");
    }

    if (errors.length) {
        errorMessage.innerHTML += "<ul>";
        errors.forEach((e) => {
            errorMessage.innerHTML += `<li>${e}</li>`;
        });
        errorMessage.innerHTML += "</ul>";

        errorDiv.classList.remove("d-none");

        window.scrollTo({ top: 0, behavior: "smooth" });
    } else {
        form.submit();
    }
}

// Id assegnati ai bottoni dei FORM CREATE e EDIT
const btnSubmitPlateCreate = document.getElementById("btn-submit-plate-create");
const btnSubmitPlateEdit = document.getElementById("btn-submit-plate-edit");

if (btnSubmitPlateCreate) {
    btnSubmitPlateCreate.addEventListener("click", (event) => {
        event.preventDefault();
        handlePlateFormSubmit("create-plate");
    });
}

if (btnSubmitPlateEdit) {
    btnSubmitPlateEdit.addEventListener("click", (event) => {
        event.preventDefault();
        handlePlateFormSubmit("edit-plate");
    });
}
