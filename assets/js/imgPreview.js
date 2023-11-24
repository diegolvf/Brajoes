let fileInput = document.getElementById('file-input');
let imageContainer = document.getElementById('img-files');
let numFiles = document.getElementById('number-of-img');

function preview() {
    imageContainer.innerHTML = '';
    numFiles.textContent = `${fileInput.files.length} Arquivos Selecionados:`;

    for (let i of fileInput.files) { // Corrigido 'imageInput' para 'fileInput'
        let reader = new FileReader();
        let figure = document.createElement('figure');
        let figCap = document.createElement('figcaption');
        figCap.innerText = i.name;
        figure.appendChild(figCap);

        reader.onload = () => {
            let img = document.createElement('img');
            img.setAttribute('src', reader.result);
            figure.insertBefore(img, figCap);
        }

        imageContainer.appendChild(figure); 
        reader.readAsDataURL(i);
    }
}