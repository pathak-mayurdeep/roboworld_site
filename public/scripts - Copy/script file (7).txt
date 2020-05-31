$('.mobile_navigation').affix({
      offset: {
        top: $('#imageContainer').height()
      }
});

$(".bar-container").click(function() {
  var scrollTop     = $(window).scrollTop(),
        elementOffset = $('.mobile_navigation').offset().top,
        distance      = (elementOffset - scrollTop);
  if(distance == 0 ){
    $(this).toggleClass("change");
    $('.sidenav').toggleClass("sidenav-toggle");
    $('.container').toggleClass("container-toggle");
  }
});

$(window).on('scroll', function () {
  var scrollTop     = $(window).scrollTop(),
        elementOffset = $('.mobile_navigation').offset().top,
        distance      = (elementOffset - scrollTop);
    if(distance > 0)  {
      $(".bar-container").toggleClass("change",false);
      $('.sidenav').toggleClass("sidenav-toggle",false);
    }
});

var totalHeight = 0,
    dropDownHeight = $(".dropdown-menu").outerHeight();

$(".dropdown-menu").children().each(function(){
    totalHeight = totalHeight + $(this).outerHeight(true);
});
$('.trig').click(function(){
  if(dropDownHeight==0){
    $('.dropdown-menu').css("height",totalHeight+"px");
    dropDownHeight = totalHeight;

  }
  else{
    $('.dropdown-menu').css("height","0");
    dropDownHeight = 0;
  }
});
