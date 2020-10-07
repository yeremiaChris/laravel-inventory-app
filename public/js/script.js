const input = document.querySelector(".gambar .inputGambar");
const tekan = document.querySelector(".gambar");
const gambar = document.querySelector(".img");
tekan.addEventListener("click", function (e) {
    input.click();
});

input.addEventListener("change", function (e) {
    const file = this.files[0];
    console.log(file);

    if (file) {
        const reader = new FileReader();
        reader.addEventListener("load", function () {
            tekan.style.backgroundImage = `url(${this.result})`;
            gambar.style.display = "none";
        });

        reader.readAsDataURL(file);
    }
});

const reset = document.querySelector(".reset");
console.log(reset);
const inputs = document.querySelectorAll("input");
const select = document.querySelector(".select");
reset.addEventListener("click", function () {
    for (let index = 0; index < inputs.length; index++) {
        inputs[index].value = "";
        select.value = "Pilih...";
        tekan.style.backgroundImage = "url('')";
        gambar.style.display = "block";
        gambar.src = "";
    }
});
