/*
*The code below toggles header search on and off.
*The code below enables the search bar to jump out and hide upon clicking the search icon.
*/

jQuery(document) .ready(function($){
   $(".search-toggle").click(function(){
       $("#search-container").slideToggle('medium', function() {
           $(".search-toggle").toggleClass('active');
        });
   });
});