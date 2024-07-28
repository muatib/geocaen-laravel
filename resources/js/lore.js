let loreData;

document.addEventListener("DOMContentLoaded", function () {
  displayContent(); // Appeler directement displayContent après le chargement du DOM
});

function displayContent() {
  let currentLoreIndex = parseInt(localStorage.getItem("currentLoreIndex")) || 0;
  
  if (loreData && loreData.length > 0) {
    const middleTxt = document.querySelector("#middle__txt");
    middleTxt.innerText = loreData[currentLoreIndex].text; 

    currentLoreIndex++;
    if (currentLoreIndex >= loreData.length) {
      currentLoreIndex = 0;
    }
    localStorage.setItem("currentLoreIndex", currentLoreIndex.toString());
  }
}

window.onload = function () {
  displayContent();
};
