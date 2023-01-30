import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', 
{
    dictDefaultMessage: "Sube aquí tu imagen",
    acceptedFiles: ".jpg, .jpeg, .png, .gif",
    addRemoveLinks: true,
    dictRemoveFile: "Eliminar imagen",
    maxFiles: 1,
    uploadMultiple: false,
    // url: "/upload",
    // paramName: "file",
    // maxFilesize: 2,
    // headers: {
    //     "X-CSRF-TOKEN": document
    //         .querySelector('meta[name="csrf-token"]')
    //         .getAttribute("content")
    // }
    init: function() {
        // alert('Dropzone creado');
        if (document.querySelector('#imagen').value.trim()) {
            const imagenPublicada = {};
            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector('#imagen').value;

            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(
                this,
                imagenPublicada, 
                `/storage/${imagenPublicada.name}`
            );
            imagenPublicada.previewElement.classList.add(
                'dz-success', 
                'dz-complete'
            );
        }
    }
});

// dropzone.on('sending', function(file, xhr, formData) {
//     console.log(formData);
    // formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute("content"));
// });

dropzone.on('success', function(file, response) {
    // console.log(response.imagen);
    document.querySelector('#imagen').value = response.imagen;
    // document.querySelector('[name => "imagen"]').value = response.imagen;
});

// dropzone.on('error', function(file, message) {
//     console.log(message);
// });

dropzone.on('removedfile', function() {
    // console.log('Archivo eliminado');
    document.querySelector('#imagen').value = '';
});