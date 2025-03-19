// Liste des scripts à charger avec leurs attributs
const scripts = [
    { src: "js/jquery-3.4.1.min.js" },
    {
        src: "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js",
        integrity: "sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo",
        crossorigin: "anonymous"
    },
    { src: "js/bootstrap.js" },
    { src: "https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" },
    { src: "https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js" },
    { src: "https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" },
    { src: "js/custom.js" },
    { src: "https://unpkg.com/ionicons@5.4.0/dist/ionicons.js" },
    { src: "https://kit.fontawesome.com/1462be1371.js", crossorigin: "anonymous" }
];

// Fonction pour charger les scripts séquentiellement
function loadScriptsSequentially(scriptList, index = 0) {
    if (index >= scriptList.length) {
        console.log("Tous les scripts ont été chargés");
        return;
    }

    const scriptInfo = scriptList[index];
    const script = document.createElement('script');

    // Ajouter tous les attributs du script
    script.src = scriptInfo.src;

    if (scriptInfo.integrity) {
        script.integrity = scriptInfo.integrity;
    }

    if (scriptInfo.crossorigin) {
        script.crossorigin = scriptInfo.crossorigin;
    }

    // Charger le script suivant après le chargement de celui-ci
    script.onload = function() {
        loadScriptsSequentially(scriptList, index + 1);
    };

    // En cas d'erreur, continuer avec le script suivant
    script.onerror = function() {
        console.error("Erreur lors du chargement de:", scriptInfo.src);
        loadScriptsSequentially(scriptList, index + 1);
    };

    // Ajouter le script au document
    document.head.appendChild(script);
}

// Démarrer le chargement des scripts lorsque le DOM est prêt
document.addEventListener("DOMContentLoaded", function() {
    loadScriptsSequentially(scripts);
});
