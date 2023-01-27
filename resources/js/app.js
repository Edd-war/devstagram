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
});