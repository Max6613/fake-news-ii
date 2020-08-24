//Tableau associatif des ID(html):ID(sql) des sous titres modifiables
const settings = { "index-phrase": 11,
                   "truc-phrase": 12,
                   "redac-phrase": 13,
                   "admin-phrase": 14,
                   "mention-phrase": 15};


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


  form.append(input);
  form.append(hide_input);
  button_div.append(validate);
  button_div.append(cancel);
  form.append(button_div);

  element.innerHTML = "";
  element.append(form);
}


//__________LISTENERS__________
$(".mod-logo").on("click", function () {
  console.log("jquery");

  let parent = this.parentNode;

  //Récupere le texte à modifier, supprime la balise <span> et les espaces autour du texte
  let prt_value = parent.innerHTML
      .replace(
          '<span class="mod-logo"><i class="fas fa-edit ico mod-icon" aria-hidden="true"></i></span>',
          ""
      )
      .trimLeft()
      .trimRight();

  addModElmnt(parent, prt_value, settings[parent.id]);
})

$(".del-logo").on("click", function () {
  let article = this.parentNode.previousSibling;

  buildModal(article.classList[1], "article");
})