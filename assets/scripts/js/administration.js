$(".del-logo").on("click", function () {
  //Article correspondant au bouton cliqué
  let article = this.parentNode.parentNode;

  //Modal de confirmation de suppression
  buildModal(article.classList[1], "article");
})