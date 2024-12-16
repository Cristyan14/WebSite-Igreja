document.getElementById("imagem").addEventListener("change", function () {
    const fileNameElement = document.getElementById("fileName");
    const file = this.files[0];
    if (file) {
        fileNameElement.textContent = file.name;
    } else {
        fileNameElement.textContent = "Nenhum arquivo selecionado";
    }
});