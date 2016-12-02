
$(document).ready(function(){
   $('#submit_type').remove();
   
   $('#choix_gateau').change(function(){
       var param = $(this).attr('name');
       var val = $(this).val();
       var url='index.php?'+param+'='+val+'&submit_type=1';
       window.location.href=url;
   });
   
   
   /*$('#hm-zoom img').mouseover(function(){
       $(this).toggle(function () {
             $(this).width('auto');
        });
   });
   */


});