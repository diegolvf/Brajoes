document.getElementById("area1").addEventListener("click", function() {
    showImage("areaImg1");
});
document.getElementById("area2").addEventListener("click", function() {
    showImage("areaImg2");
});
document.getElementById("area3").addEventListener("click", function() {
    showImage("areaImg3");
});
function showImage(imageId) {
    const imageContainers = document.getElementsByClassName("containerImage");
    for (const container of imageContainers) {
        container.style.display = "none";
    }
    const selectedImage = document.getElementById(imageId);
    selectedImage.style.display = "block";
}
const ajusteContainer = document.querySelector('.containerGlobal');
const inputSocial = document.querySelectorAll('.inputSocial');

inputSocial.forEach(area => {
    area.addEventListener('click', () => {
        ajusteContainer.style.display = 'flex'
    })
});