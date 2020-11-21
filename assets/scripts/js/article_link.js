$(".article").click(function () {
  window.location =
    "/article_details.php?id=" + $(this).attr("class").replace("article ", "");
  return false;
});
