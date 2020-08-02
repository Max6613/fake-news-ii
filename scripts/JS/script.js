$(document).ready(function () {
    // affiche ou masque le menu nav en fonction de l'etat de la checkbox'
    $("input[name=burger-check]").change(function () {
        if ($(this).is(":checked")){
            $("body").addClass("open");
        } else {
            $("body").removeClass("open");
        }
    });


    /* Si agrandissement de la fenetre en mode bureau avec le menu déployer,
   déplacement à la position d'origine */
    $(window).resize(function () {
        if($(window).width() > 991 && $("#burger-cmd").prop("checked")){
            $("#burger-cmd").prop("checked", false);

            /* Le changement d'état de la checkbox via JS
               ne déclenche pas l'event change */
            $("body").removeClass("open");
        }
    });
});


//____________Form contact + modal____________
//Supprime UN message d'erreur s'il existe
function delLabel(name) {
    if ($("label[for=" + name).length){
        $("label[for=" + name).remove();
    }
}

//Si focus sur input/textarea -> appel fonction de suppression de message d'erreur
$("input[name=name]").focus(function () {
    delLabel(this.getAttribute("name"));
});

$("input[name=email]").focus(function () {
    delLabel(this.getAttribute("name"));
});

$("textarea[name=mess]").focus(function () {
    delLabel(this.getAttribute("name"));
});


//Affiche la modale de réussite
function buildModal(){
    $('body').append("<div class='modal'><p>On vous avait prévenu qu'il allait faire " +
        "tout noir...<br>Votre message en à profité pour s'enfuir jusqu'à chez nous!</p>" +
        "<button onclick='closeModal()'><i class='fas fa-check'></i> J'AI PEUR DU NOIR :'(</button></div>" +
        "<div class='layer'></div>")
}


//Affiche messages d'erreurs
function errorMess(fieldName){
    //Affichage message d'erreur
    let mess = "";

    switch (fieldName){
        case "name":
            mess = "Les lettres anonymes c'est mal !";
            break;
        case "email":
            mess = "Et comment on fait pour vous spammer ?";
            break;
        case "mess":
            mess = "Non mais allô quoi, tu nous écris et tu nous écris rien ?";
            break;
        case "":
            return null;
    }
    $("#" + fieldName).after("<label class='error' for='" + fieldName + "'>" + mess + "</label>")
}


//Efface le contenu des champs en erreur
function delErrorField(inputs, error = true){
    if (inputs.length > 0){
        for (let i = 0; i < inputs.length; i++){
            //Effacage des champs invalide
            $("#" + inputs[i]).val("");

            if (error){
                /* affiche les mess d'erreurs uniquement lors
                   de l'appel via la fonction de verif */
                errorMess(inputs[i]);
            }
        }
    } else{
        buildModal();
        //Rappel de la fonction pour effacer les champs
        delErrorField(["name", "email", "mess"], false);
    }
}


//Vérifie la validité des entrées
function formVerif(){
    let inputs = {"name": $("#name"), "email": $("#email"), "mess": $("#mess")};
    let errors = [];

    let nameRegex = /^[a-zA-Z-'\s]+$/;
    let emailRegex = new RegExp(/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/);

    for (let key in inputs){
        //Suppression des messages d'erreurs existants
        delLabel(key);

        switch (key){
            case "name":
                //si name vide ou ne correspond pas à la regex
                if (inputs[key].val() === "" || !nameRegex.test(inputs[key].val())){
                    //Nom invalide
                    errors.push(key);
                }
                break;
            case "email":
                //si email vide ou ne correspond pas à la regex
                if (inputs["email"].val() === "" || !emailRegex.test(inputs["email"].val().toLowerCase())){
                    //mail invalide
                    errors.push(key);
                }
                break;
            case "mess":
                //si message vide
                if (inputs["mess"].val() === ""){
                    //message invalide
                    errors.push(key);
                }
                break;
        }
    }
    delErrorField(errors);
}


//Retire la modal du html
function closeModal() {
    $(".modal").remove();
    $(".layer").remove();
}