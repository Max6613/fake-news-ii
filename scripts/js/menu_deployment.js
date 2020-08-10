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

            /* Le changement d'état de la checkbox via js
               ne déclenche pas l'event change */
            $("body").removeClass("open");
        }
    });
});