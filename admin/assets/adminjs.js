document.addEventListener("DOMContentLoaded", function() {
    document.querySelector('.file-upload-browse').addEventListener('click', function() {
        document.querySelector('.file-upload-default').click();
    });

    document.querySelector('.file-upload-default').addEventListener('change', function() {
        var filename = this.value.split('\\').pop();
        document.querySelector('.file-upload-info').value = filename;
    });
});
