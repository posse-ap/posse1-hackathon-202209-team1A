function main() {
    const input = document.querySelector("#image");
    const figure = document.querySelector("#figure");
    const figureImage = document.querySelector("#figureImage");

    input.addEventListener("change", (event) => {
        const [file] = event.target.files;

        if (file) {
            figureImage.setAttribute("src", URL.createObjectURL(file));
            figure.style.display = "block";
        } else {
            figure.style.display = "none";
        }
    });
}

main();
