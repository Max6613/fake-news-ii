/**
 * Créé une balise html avec en option des attributs et une valeur
 */
function createHtmlElmnt(markup, attribute = null, value = null) {
  markup = document.createElement(markup);

  if (attribute != null) {
    for (let attr in attribute) {
      markup.setAttribute(attr, attribute[attr]);
    }
  }

  if (value != null) {
    markup.innerHTML = value;
  }
  return markup;
}
