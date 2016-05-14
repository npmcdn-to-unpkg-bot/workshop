 /*!
  * Author: Russell Gordon for tryl.es
  * Code licensed under the Apache License v2.0.
  * For details, see http://www.apache.org/licenses/LICENSE-2.0.
  */

$(document).ready(function() {

     $(".scroll").click(function(event) {
         event.preventDefault();
         var full_url = this.href;
         var parts = full_url.split("#");
         var trgt = parts[1];
         var target_offset = $("#" + trgt).offset();
         var target_top = target_offset.top;

         $('html, body').animate({
             scrollTop: target_top
         }, 500);
     });

 });