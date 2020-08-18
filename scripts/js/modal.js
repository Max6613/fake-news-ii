/**
 * Supprime la modal du code html
 */
function closeModal() {
  $(".modal").remove();
  $(".layer").remove();
}

/**
 * Créer la modal de confirmation pour la suppression d'un article
 */
function buildModal(id, content) {
  switch (content) {
    case "utilisateur":
      script = "user";
      break;

    case "article":
      script = "article";
      break;

    default:
      script = "article";
  }

  let p = createHtmlElmnt(
    "p",
    {},
    "Etes-vous sur de vouloir supprimer cet " + content + " ?"
  );

  let valid_btn = createHtmlElmnt("button", { type: "submit" }, "Supprimer");
  let cancel_btn = createHtmlElmnt(
    "button",
    { onclick: "closeModal()" },
    "Annuler"
  );

  let form = createHtmlElmnt("form", {
    action: "/scripts/php/del_" + script + ".php?id=" + id,
    method: "POST",
    id: "del_form",
  });
  form.appendChild(p);
  form.appendChild(valid_btn);
  form.appendChild(cancel_btn);

  let modal = createHtmlElmnt("div", { class: "modal" });
  modal.appendChild(form);

  let layer = createHtmlElmnt("div", { class: "layer" });

  $("body").append(modal);
  $("body").append(layer);
}
