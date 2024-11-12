// Couleurs disponibles pour les particules
const colors = ["#000000", "#000000", "#000000", "#22ff00", "#FF33A8"];

// Fonction pour créer des particules
function createParticles(x, y) {
    const numberOfParticles = 10; // Nombre de particules à créer

    for (let i = 0; i < numberOfParticles; i++) {
        // Créer un élément de particule
        const particle = document.createElement("div");
        particle.classList.add("particle");

        // Taille aléatoire
        const size = Math.random() * 15 + 5 + "px";
        particle.style.width = size;
        particle.style.height = size;

        // Couleur aléatoire
        particle.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];

        // Position de départ
        particle.style.left = x + "px";
        particle.style.top = y + "px";

        // Ajouter l'élément au DOM
        document.body.appendChild(particle);

        // Supprimer la particule après l'animation
        particle.addEventListener("animationend", () => {
            particle.remove();
        });
    }
}

// Événements pour créer des particules au clic et au mouvement de souris
window.addEventListener("click", (e) => {
    createParticles(e.clientX, e.clientY);
});

window.addEventListener("mousemove", (e) => {
    createParticles(e.clientX, e.clientY);
});
