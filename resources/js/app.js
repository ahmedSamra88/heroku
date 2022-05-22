require('./bootstrap');

require('../views/include/chat/realtimechat-firebase');
$(function(){
    $("input[name='options-design']").on("change",function(){
        if($('#0-outlined').is(":checked")){
            $("#service-5").attr('disabled',"disabled").prop('checked',false);
        }else{
            $("#service-5").removeAttr('disabled');
        }

    });
});
