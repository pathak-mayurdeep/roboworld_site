document.body.style.zoom = 1.0;

$('.navbar').affix({
      offset: {
        top: $('#imageContainer').height()
      }
});
//document.getElementById("val_1").innerHTML = '"'+$('#imageContainer').height()+'"';
console.log($('#imageContainer').height());

//data-offset-top="768"

$('.loading').fadeOut(4000, function() {
      $(this).hide();
});



/*  <div class="facebook_feed">
    <div class="fb-page" data-href="https://www.facebook.com/jecroboworld/" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/jecroboworld/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/jecroboworld/">JEC Roboworld</a></blockquote></div>
  </div>
*/
