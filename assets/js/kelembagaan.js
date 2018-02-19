//on-load action
$(function(){
    //materialize
    $(".button-collapse").sideNav();
    $('.navigation-collapse').sideNav();
    $(".dropdown-button").dropdown({constrainWidth: false});

    $(".kelembagaan-tab").unbind().on("click", function(){
      target = $(this).attr("href");
      target = target.replace("#", "");
      $("#hibah-add").attr("href", "kelembagaan/add/" + target);
    });
});
