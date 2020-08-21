//Suppression d'utilisateur
$(".fa-trash-alt").on("click", function () {
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

//Ajout d'utilisateur
$(".fa-plus-circle").on("click", function () {
  //Suppression du texte et icone pour l'ajout d'utilisateur
  $(".user-add").empty();

  //remplacement par un formulaire d'ajout d'utilisateur
  //id
  let inp_id = createHtmlElmnt("input", {
    type: "text",
    name: "id",
    value: "AUTO",
    class: "user-id",
    size: "4",
    disabled: true,
  });

  //login
  let inp_login = createHtmlElmnt("input", {
    type: "text",
    name: "login",
    size: "10",
    placeholder: "Identifiant",
  });

  let inp_psswd = createHtmlElmnt("input", {
    type: "text",
    name: "psswd",
    size: "10",
    placeholder: "Mot de passe",
  });
  let span_log = createHtmlElmnt("span", { class: "user-login" });
  span_log.append(inp_login, inp_psswd);

  //role
  let opt_admin = createHtmlElmnt(
    "option",
    { value: "administrator" },
    "Administrateur"
  );
  let opt_read = createHtmlElmnt("option", { value: "reader" }, "Lecteur");
  let opt_redac = createHtmlElmnt("option", { value: "redactor" }, "Rédacteur");

  let slct_role = createHtmlElmnt("select", {
    name: "role",
    class: "user-role",
  });
  slct_role.append(opt_read, opt_admin, opt_redac);

  //Boutons
  let validate = createHtmlElmnt(
    "button",
    { type: "submit", class: "btns" },
    "Ajouter"
  );
  let cancel = createHtmlElmnt(
    "button",
    { type: "button", class: "btns" },
    "Annuler"
  );

  let form = createHtmlElmnt("form", {
    action: "scripts/php/set_user.php",
    method: "post",
  });

  form.append(inp_id, span_log, slct_role, validate, cancel);

  $(".user-add").append(form);
});
