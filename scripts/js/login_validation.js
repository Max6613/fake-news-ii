
//TODO validation de données du formulaire de connexion

//Suppression d'un message d'erreur
function delErrorLabel( name ) {
    if ( $("label[for=" + name + "]").length ){
        $("label[for=" + name + "]").remove();
    }
}

//Si focus sur un input -> suppression du label d'erreur
$("input[name=login]").focus(function () {
    delErrorLabel(this.getAttribute("name"));
});

$("input[name=passwd]").focus(function () {
    delErrorLabel(this.getAttribute("name"));
});


//Affiche messages d'erreurs
function errorMess(fieldName){
    //Affichage message d'erreur
    let mess = "";

    switch (fieldName){
        case "login":
            mess = "Les lettres anonymes c'est mal !";
            break;

        case "passwd":
            mess = "Le mot de passe ne peut pas être vide !";
            break;

        case "":
            return null;
    }
    $("#" + fieldName).after("<label class='error-valid' for='" + fieldName + "'>" + mess + "</label>")
}


//Efface le contenu des champs en erreur
function delErrorField(inputs){
    if (inputs.length > 0){
        for (let i = 0; i < inputs.length; i++){
            //Effacage des champs invalide
            $("#" + inputs[i]).val("");
            errorMess(inputs[i]);
        }
    } else{
        //TODO submit le formulaire
        $("#login-form").submit();
    }
}


//Vérifie la validité des entrées
function formValidation(){
    //champs du formulaire à vérifier
    let inputs = {"login": $("#login"), "passwd": $("#passwd")};
    let errors = [];

    let nameRegex = /^[a-zA-Z-'\s]+$/;

    for (let key in inputs){
        //Suppression des messages d'erreurs existants
        delErrorLabel(key);

        switch (key){
            case "login":
                //si name vide ou ne correspond pas à la regex
                if (inputs[key].val() === "" || !nameRegex.test(inputs[key].val())){
                    errors.push(key);
                }
                break;

            case "passwd":
                //TODO ajouter difficulté obligatoir au mdp
                //si mot de passe vide
                if (inputs["passwd"].val() === "" ){
                    errors.push(key);
                }
                break;
        }
    }
    //suppression du contenu du champs
    delErrorField(errors);
}