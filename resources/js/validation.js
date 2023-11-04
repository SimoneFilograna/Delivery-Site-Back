//--------REGISTER FORM VALIDATION ERRORS----------//

// Id assigned to the REGISTER FORM buttons
const btnSubmitRegister = document.getElementById("btn-submit-plate-register");

// Function that regulates the minimum length of strings
function checkLength(string, length = 1, max = false) {
    if (max) {
        return string.length === length;
    } else {
        return string.length >= length;
    }
}

// addEventListener at CLICK
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
        // USERNAME error
        if (!checkLength(inputs.name.value.trim())) {
            errors.push("Il nome dell'utente è obbligatorio");
        }
        // EMAIL error
        if (
            !inputs.email.value.match(
                /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            )
        ) {
            errors.push("La mail è obbligatoria e deve essere una mail corretta");
        }
        // Password error
        if (!checkLength(inputs.password.value.trim(), 8)) {
            errors.push("La password è obbligatorio e deve essere almeno di 8 caratteri");
        }
        // PASSWORD confermation
        if (!checkLength(inputs.password_confirmation.value.trim(), 8)) {
            errors.push("La password va confermata");
        }
        // PASSWORD must match
        if (inputs.password.value.trim() !== inputs.password_confirmation.value.trim()) {
            errors.push("Le password devono corrispondere");
        }
        // RESTAURANT NAME error
        if (!checkLength(inputs.restaurant_name.value.trim())) {
            errors.push("Il nome del ristorante è obbligatorio");
        }
        // RESTAURANT ADDRESS error
        if (!checkLength(inputs.restaurant_address.value.trim())) {
            errors.push("L'indirizzo è obbligatorio");
        }
        // PHONE error
        if (!checkLength(inputs.restaurant_address.value.trim())) {
            errors.push("Devi inserire un recapito telefonico");
        }
        // RESTAURANT IMAGE error
        if (inputs.restaurant_image.value == "") {
            errors.push("Devi caricare una immagine per il tuo ristorante");
        }
        // Function that validates the VAT_NUMBER
        function validateVATNumber(vatNumber) {
            // Check if the VAT number is empty
            if (vatNumber.trim() === '') {
                return "La Partita IVA è obbligatoria";
            }
        
            // Check if the VAT number has exactly 11 numeric characters
            if (!/^\d{11}$/.test(vatNumber)) {
                return "La Partita IVA deve contenere esattamente 11 caratteri numerici";
            }
        
            // If the VAT number passes both checks above, return null to indicate that it is valid
            return null;
        }
        
        const vatNumber = inputs.vat_number.value.trim();
        const vatErrorMessage = validateVATNumber(vatNumber);
        
        if (vatErrorMessage) {
            errors.push(vatErrorMessage);
        }

        const checkboxes = document.querySelectorAll('input[type="checkbox"]');

        //Tipology CUISINES Checkbox error
        if (!Array.prototype.slice.call(checkboxes).some((x) => x.checked)) {
            errors.push("Almeno una tipologia deve essere selezionata");
        }
        // Print errors in ul with bootstrap
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


//--------PLATES CREATE and EDIT FORMS VALIDATION ERRORS----------//

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

    //Plate NAME error
    if (!checkLength(inputs.plate_name.value.trim())) {
        errors.push("Il nome è obbligatorio");
    }
    //Plate INGREDIENTS error
    if (!checkLength(inputs.ingredients.value.trim())) {
        errors.push("Devi scrivere gli ingredienti");
    }
    //Plate PRICE error
    if (!inputs.price.value || isNaN(inputs.price.value)) {
        errors.push("Il prezzo è obbligatorio");
    } else if (parseFloat(inputs.price.value) < 0) {
        errors.push("Il prezzo deve essere positivo");
    }
    //Plate DESCRIPTION error
    if (!checkLength(inputs.description.value.trim())) {
        errors.push("Devi scrivere la descrizione del piatto");
    }
    // Print errors in ul with bootstrap
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

// Id assigned to the CREATE and EDIT FORM buttons
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
