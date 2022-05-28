$(document).ready(function () {
  $(".navShowHide").on("click", function () {
    var main = $("#mainSectionContainer");
    var nav = $("#sideNavContainer");

    if (main.hasClass("leftPadding")) {
      nav.hide();
    } else {
      nav.show();
    }

    main.toggleClass("leftPadding");
  });
});

function notSignedIn() {
  alert("Debe iniciar sesión para realizar esta acción");
}
