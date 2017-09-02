jQuery(document).ready(function ($) {
   var api = wp.customize;
   
   $('input.startcamp-checkboxes').change(function(){
       var updateId = $(this).attr('data-hidden-id');
       var set = $(this).attr('name');
       var output = [];
       $("input[name="+set+"]").each(function(){
           
           if($(this).is(':checked')){
               output.push($(this).val());
           }
       });       
       $("#"+updateId).val(output.join());
       api.instance( $("#"+updateId).attr('data-customize-setting-link')).set( output.join() );
   });
});
