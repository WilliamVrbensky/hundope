/*
*Toggles header search on and off
*/

jQuery(document) .ready(function($){
   $(".search-toggle").click(function(){
       $("#search-container").slideToggle('medium', function() {
           $(".search-toggle").toggleClass('active');
        });
   });
});