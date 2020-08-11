function modThisElmnt(element) {
  $(element).replaceWith(
    $("<input type='text' value='" + this.innerHTML + "'>")
  );
}

const phrase = document.querySelector("#phrase");

phrase.addEventListener("click", function () {
  modThisElmnt("#phrase");
  console.log(this.innerHTML);
});

//TODO rajouter dans le tag selectionner un input texte à la place du texte, contenant le texte précédent
// + un bouton pour valider et un pour annuler
// le bouton valider modifiera en BDD ??????
//          il faut enregistrer le sous titre en bdd ????????
