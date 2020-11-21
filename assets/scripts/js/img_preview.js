function readURL(input) {
  if (input.files && input.files[0]) {
    let reader = new FileReader();

    reader.onload = function (e) {
      $("#img-prev").attr("src", e.target.result);
      console.log(e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

function selectPrev(select) {
  $("#img-prev").attr("src", "assets/imgs/" + select);
}

$("#image").change(function () {
  readURL(this);
});

$("#img-select").change(function () {
  console.log("select");
  selectPrev($(this).val());
});
