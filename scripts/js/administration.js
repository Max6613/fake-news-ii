//TODO convertir en jquery

//Tableau associatif des ID(html):ID(sql) des sous titres modifiables
const settings = { "index-phrase": 1, "truc-phrase": 2 };

/**
 * Annule la modification et rajoute le texte d'origine
 */
function cancelMod() {}

/**
 * Ajoute un formulaire de modification a la place du contenu
 */
function addModElmnt(element, value, id) {
  let form = createHtmlElmnt("form", {
    method: "POST",
    action: "scripts/php/mod_setting.php",
    id: "form-mod",
  });

  let input = createHtmlElmnt("input", {
    type: "text",
    name: "modification",
    value: value,
    id: "inp-mod",
  });

  let hide_input = createHtmlElmnt("input", {
    type: "hidden",
    name: "id",
    value: id,
  });

  let button_div = createHtmlElmnt("div", { class: "button-div" });

  let validate = createHtmlElmnt(
    "button",
    { type: "submit", class: "no-link" },
    "Valider"
  );

  let cancel = createHtmlElmnt(
    "button",
    { type: "button", onclick: "history.go(0)", class: "no-link" },
    "Annuler"
  );

  form.appendChild(input);
  form.appendChild(hide_input);
  button_div.appendChild(validate);
  button_div.appendChild(cancel);
  form.appendChild(button_div);

  element.innerHTML = "";
  element.appendChild(form);
}

//__________LISTENERS__________
const mod_logo = document.querySelector(".mod-logo");

mod_logo.addEventListener("click", function () {
  let parent = this.parentNode;
  //Récupere le texte à modifier, supprime la balise <span> et les espaces autour du texte
  let prt_value = parent.innerHTML
    .replace(
      '<span class="mod-logo"><i class="fas fa-edit mod-icon" aria-hidden="true"></i></span>',
      ""
    )
    .trimLeft()
    .trimRight();

  let id = null;
  switch (parent.id) {
    case "index-phrase":
      id = 1;
      break;
    case "truc-phrase":
      id = 2;
      break;
  }

  addModElmnt(parent, prt_value, settings[parent.id]);
});

const del_logo = document.querySelector(".del-logo");

del_logo.addEventListener("click", function () {
  let article = this.parentNode.nextElementSibling;

  buildModal(article.classList[1], "article");
});
