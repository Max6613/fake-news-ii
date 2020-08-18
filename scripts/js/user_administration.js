$(".mod-icon").on("click", function () {
  console.log("coucou click");
  let user = this.parentNode;

  buildModal(user.classList[1], "utilisateur");
});

//Au changement de valeur du select, si la valeur selectionné
// est la valeur par défaut, alors on désactive le bouton,
// sinon on l'active
$("select").on("change", function () {
  selection = $(this).val();
  btn = $(this).next();

  if (
    $(this)
      .find("option[value=" + selection + "]")
      .attr("selected")
  ) {
    //Désactive le bouton
    btn.attr("disabled", "_blank");
  } else {
    //Active le bouton
    btn.removeAttr("disabled");
  }
});
