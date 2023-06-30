var app = {
    init: function(){
        // On sélectionne le bouton pour changer de vue
        var button = document.querySelector('.change-view');
        // On écoute le clic dessus
        button.addEventListener('click', this.toggleView);
    },
    toggleView: function() {
        // On sélectionne tous les "conteneurs" de vues différentes : celle pour les couvertures et celle pour la liste détaillée
        var views = document.querySelectorAll('.view');
        // On boucle sur les vues et on "switch" la classe qui permet de les cacher
        for (view in views) {
            views[view].classList.toggle('hidden');
        }
    }
}
app.init();