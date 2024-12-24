import './bootstrap';

function hideForms(){
    document.querySelectorAll('.sidebar .item').forEach(function (element) {
        element.querySelector('.storeForm, .editForm').style.display = "none";
        element.querySelector('.entry').style.display = "flex";
    });
}

document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('.storeOrUpdate').addEventListener('click', function () {
        hideForms();
        document.querySelector('.storeOrUpdateForm').style.display = "inline-flex";
        document.querySelector('.noteList').style.display = "none";
    });

    document.querySelectorAll('.cancelNote').forEach(function (element) {
        element.addEventListener('click', function () {
            hideForms();
            document.querySelector('.storeOrUpdateForm').style.display = "none";
            document.querySelector('.showNote').style.display = "none";
            document.querySelector('.noteList').style.display = "inline-block";    
        });
    });

    document.querySelectorAll('.note').forEach(function (element) {
        element.addEventListener('click', function () {
            hideForms();
            document.querySelector('.showNote').style.display = "inline-block";
            document.querySelector('.noteList').style.display = "none";
        });
    });

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

            entry.querySelector('.storeForm, .editForm, .storeOrUpdateForm').style.display = "none";
            entry.querySelector('.entry').style.display = "flex";
        });
    });
});