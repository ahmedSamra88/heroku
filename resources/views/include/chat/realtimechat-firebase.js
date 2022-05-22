// start realtime chate using firebase
$(function(){
    const chat_msg=".realtime-chat  .chat-msg";
    // show/hide chatbox
    if($(".realtime-chat-icon")){
        $(".realtime-chat-icon").on("click",function(){
            $(this).fadeOut("fast",function(){
                $(".realtime-chat").slideToggle();
                $(".realtime-chat input").focus();
                // msg scroll bottom
                $(chat_msg).scrollTop($(chat_msg)[0].scrollHeight);
            });
        });
    }
    $(".realtime-chat .btn-close").on("click",function(){
        $(".realtime-chat").slideToggle("fast",function(){
            $(".realtime-chat-icon").fadeIn();
        });
    });
    
 
});