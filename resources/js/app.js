import './bootstrap';
import '~resources/scss/app.scss';
import '~icons/bootstrap-icons.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])
// colletction di array di bottoni delete
const deleteSubmitButtons = document.querySelectorAll(".delete-button");
// tramite il forEach prendiamo tutti i bottoni delete e aggiungiamo l'event listener
deleteSubmitButtons.forEach((button) => {
    button.addEventListener("click", (event) => {
        event.preventDefault();
        // prendiamo il valore dell'attributo data-item-title
        const dataTitle = button.getAttribute("data-item-title");
        // prendiamo la modal
        const modal = document.getElementById("deleteModal");

        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();
        // impostiamo il titolo della modale con il valore del data-item-title
        const modalItemTitle = modal.querySelector("#modal-item-title");
        modalItemTitle.textContent = dataTitle;
        //prendiamo il bottone delete della modal
        const buttonDelete = modal.querySelector("button.btn-primary");
        // aggiungiamo l'event listener al bottone delete della modale
        buttonDelete.addEventListener("click", () => {
            button.parentElement.submit();
        });
    });
});


const image = document.getElementById("cover_image");
if(image) {
    image.addEventListener("change", function () {

        const preview = document.getElementById("uploadPreview");
        const reader = new FileReader();
        reader.readAsDataURL(image.files[0]);
        reader.onload = function (reader){
            preview.src = reader.target.result;
        };
    });
}
