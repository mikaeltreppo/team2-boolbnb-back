import "./bootstrap";
import "./chartImplement";
import "~resources/scss/app.scss";
import "./validationsCreateEditApartment";
import "./validationsRegister";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);

//MODAL DELETE

const deleteButtons = document.querySelectorAll(
    '.form_delete_post button[type="submit"]'
);

deleteButtons.forEach((button) => {
    button.addEventListener("click", (event) => {
        event.preventDefault();

        const modal = document.getElementById("confirmModal");

        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();

        const confirmDeleteBtn = modal.querySelector(".btn.btn-danger");

        confirmDeleteBtn.addEventListener("click", () => {
            button.parentElement.submit();
        });
    });
});

const btnDelete = document.getElementById("btn-delete");

btnDelete.addEventListener("click", function () {
    const formDelete = document.getElementById("form-delete");
    formDelete.submit();
});
