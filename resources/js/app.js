import './bootstrap';

function hideForms(){
    document.querySelectorAll('.item').forEach(function (element) {        
        element.querySelector('.storeForm, .editForm').style.display = "none";
        element.querySelector('.entry').style.display = "flex";
    });
}

window.addEventListener('load', function () {
    document.querySelector('.store').addEventListener('click', function () {
        hideForms();
        let entry = document.querySelector('.store').closest('.item');

        entry.querySelector('.storeForm').style.display = "flex";
        entry.querySelector('.entry').style.display = "none";
    });

    document.querySelectorAll('.edit').forEach(function (element) {
        element.addEventListener('click', function () {
            hideForms();
            let entry = element.closest('.item');

            entry.querySelector('.editForm').style.display = "flex";
            entry.querySelector('.entry').style.display = "none";
        });
    });

    document.querySelectorAll('.cancel').forEach(function (element) {
        element.addEventListener('click', function () {
            hideForms();
            let entry = element.closest('.item');

            entry.querySelector('.storeForm, .editForm').style.display = "none";
            entry.querySelector('.entry').style.display = "flex";
        });
    });
});