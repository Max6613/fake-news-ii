$(".article").click(function () {
  window.location =
    "/detail_article.php?id=" + $(this).attr("class").replace("article ", "");
  return false;
});
