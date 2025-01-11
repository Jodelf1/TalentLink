'use strict'

let foto = document.getElementById('foto');
let imagemupload = document.getElementById('foto_capa');

foto.addEventListener('click', () => {
    imagemupload.click();
    });

imagemupload.addEventListener('change', () => {
        let reader = new FileReader();
            reader.onload = () =>{
                foto.src = reader.result;
            }
        reader.readAsDataURL(imagemupload.files[0])
})