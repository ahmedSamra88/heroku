<!-- realtime-chat -->
<?php
    global $ID,$current_user; wp_get_current_user(); 
    $username=$current_user->display_name;
    $rule = array_shift($current_user->roles);
    $ID=get_current_user_id() ;
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">
<!--<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

<script type="module">
    // Import the functions you need from the SDKs you need
    import {  initializeApp } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-app.js";
    import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-analytics.js";
    import { getDatabase , ref, set , push , onValue , update } from 'https://www.gstatic.com/firebasejs/9.6.1/firebase-database.js';
    // Set the configuration for your app
    // TODO: Replace with your project's config object
    const firebaseConfig = {
    apiKey: "AIzaSyBXuiY7NX2hHE2-L4ZkyfvC8KvZ1LjT6a0",
    authDomain: "investment-chicks.firebaseapp.com",
    projectId: "investment-chicks",
    storageBucket: "investment-chicks.appspot.com",
    messagingSenderId: "670055312117",
    appId: "1:670055312117:web:e1e68b52f615e79b3f33bc",
    databaseURL: "https://investment-chicks-default-rtdb.firebaseio.com/"
  };
    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    // Get a reference to the database service
    const database = getDatabase(app);
    const analytics = getAnalytics(app);
    // const messageRef = db.ref("message");
    const user_room = ref(database, "users/room-"+<?php echo $ID; ?>);
    const users = ref(database, "users");
    
    jQuery(function ($) {
        var chat_msg = $(".chat-msg");
    
    // 
        var msg = $(".msg");
        rooms("<?php echo $rule;?>");
        $(".nav-link").on("click",function(){
            rooms("<?php echo $rule;?>");
        });
        function rooms(rule) {
            onValue(users,(snapshot) => { 
    
                const data = snapshot.val(); 
                msg.text("");
                Object.keys(data).forEach(key => {
                    for (let [k,v] of Object.entries(data[key])) {
                        let current_class="bg-warning m-1 p-1 d-inline-block";
                        let msg_class="text-end ";
                        if (v.rule != rule) {
                            current_class="bg-light m-1 p-1 d-inline-block";
                            msg_class="text-start";
                        }
                        var subject=v.body;
                        
    
                    if(v.attachment != ""){
                        subject=v.attachment;
                        var parts= subject.split("/");
                        var last_part = parts[parts.length-1];
                        var fileExtension = last_part.substring(last_part.lastIndexOf('.') + 1); 
                        if(fileExtension === "pdf"){
                            subject = `<a href="`+subject+`"> <i class="dashicons dashicons-pdf"></i> <br>`+  last_part +`</a>`;
                        }else{
                            
                            subject = `<a href="`+subject+`"><img width="80" src="`+subject+`"> <br>`+  last_part +`</a>`;
                        }
                    }
                    var chat_msg =$("#"+key + " .msg");
                    var room =$("#"+key);
                    var msg = `<div class="`+msg_class+`  ">
                            <div class="`+current_class+` shadow-sm  rounded">
                                `+subject+`
                            </div>
                        </div><br>`;
                    chat_msg.append(msg); 
                        if($("#"+key)[0]){
                            $("#"+key)[0].scrollTop=$("#"+key)[0].scrollHeight;    
                        }
                    }
                });
            });
        }
    
        $(".messengar .attchmentBtn").on('click',function(){
            $(this).siblings("input[type=file]").click();
        });
            $('.messengar form input[type=file]').on("change",function(){
            var data = new FormData()
            let room = $(this).siblings('input[name="room"]');
            // Add data/files to formdata var
    
            $(this).each(function(index, field){
                const file = field.files[0];
                if(file.size > 5242880 || file.fileSize > 5242880) {
                    errorMessage = 'حجم الملف لايزيد عن 5 ميجابيتس.';
                }else{  
                    data.append('my_file_upload', file);
                }
            });
            var _nonce = "<?php echo wp_create_nonce( 'wp_rest' ); ?>";
    
            $.ajax({
            url: '<?php echo  network_site_url( '/' )?>wp-json/wp/v2/file/save',
            type: 'POST',
            beforeSend: function(xhr) {
                xhr.setRequestHeader( 'X-WP-Nonce', _nonce);
            },
            data: data,
            cache: false,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: (data) => {
                const message = {
                        userID:<?php echo $ID; ?>,
                        body:"",
                        read:0,
                        attachment:data.url,
                };
                if(message.attachment){   
                    message.rule="<?php echo $rule ?>"; 
                    const user_room = ref(database, "users/"+room.val());
                    push(user_room, message);
                    // $(this).find('input[type="file"]').val("");
                }
    
            }
            });
         });
         
                  $('.messengar  form').on("submit",function(e){
        e.preventDefault();
        const body = $(this).find('input[name="msg"]');
        const room = $(this).find('input[name="room"]');
        body.focus();
        if(body.val() ==="" || body.val() === null ){
            return;
        }
       
       const message = {
            userID:<?php echo $ID; ?>,
            body:body.val(),
            read:0,
            attachment:"",
        };
        chat_msg.text("");
        if(message.body || message.attachment){   
            message.rule="<?php echo $rule;?>"; 
            // console.log(room.val());
            // alert(room);
            const user_room = ref(database, "users/"+room.val());

            push(user_room, message);
            $(this).find('input[name="msg"]').val("");
        }

    });

    });

    // $('.messengar .realtime-chat-icon').on("click",function(e){
    //     updateMSG();

    // });
    function sentMSG(message={},rule="admin",room) {
        chat_msg.text("");
        if(message.body || message.attachment){   
            message.rule=rule; 
            push(user_room, message);
            $('.messengar .realtime-chat input[type="text"]').val("");
        }
        onValue(user_room,(snapshot) => { 
            let counter=0;
            chat_msg.text("");

            const data = snapshot.val(); 
            
            Object.keys(data).forEach(key => {
                let current_class="current-user";
                let msg_class="";
                if (data[key].rule != rule) {
                    current_class="other";
                    msg_class="text-start";
                }
                var subject=data[key].body;
                
                

                if(data[key].attachment != ""){
                    subject=data[key].attachment;
                    var parts= subject.split("/");
                    var last_part = parts[parts.length-1];
                    subject = `<a href="`+subject+`">`+ last_part +`</a>`;
                }
                var msg = `<div class=`+msg_class+`>
                                <div class=`+current_class+`>
                                    `+subject+`
                                </div>
                            </div>`;
                chat_msg.append(msg);
                chat_msg.scrollTop(chat_msg[0].scrollHeight);
                
                if(data[key].read == 0 && data[key].rule != rule){
                    // if(flag) updateMSG("room-"+userID+"/"+key,data[key],database);
                    counter++;
                }


            });
            
            if (counter > 0) {
                $(".messengar .realtime-chat-icon .icon .badge").removeClass("d-none");
                $(".messengar .realtime-chat-icon .counter").text(counter + "+");
            }
        });
        
    }
    // function updateMSG(rule) {
    //     onValue(user_room,(snapshot) => { 
    //         let counter=0;

    //         const data = snapshot.val(); 
            
    //         Object.keys(data).forEach(key => {
    //             if(data[key].read == 0 && data[key].rule != rule){
    //                 // if(flag) updateMSG("room-"+userID+"/"+key,data[key],database);
    //                 data[key].read=1;
    //                 counter--;
    //             }

    //         });
    //         update(user_room,data);                

    //         if (counter <= 0) {
    //             $(".messengar .realtime-chat-icon .icon .badge").addClass("d-none");
    //             $(".messengar .realtime-chat-icon .counter").text(counter + "+");
    //         }
    //     });
    //     return;
        
        
    // }
</script>
<?php
global $wpdb;
// Initialize message variable
  $msg = "";
// get investor users
$args = array(
    'role'    => 'investor',
    'orderby' => 'user_nicename',
    'order'   => 'ASC'
);
$users = get_users( $args );
?>
<div class="messengar">
    <div class="rooms" >
        <div class="container py-4">
            <div class="row" >
                <div class="col-3" style="max-height:80vh;overflow-y:auto;">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <?php foreach ($users as $key => $user) { ?>
                        <a class="nav-link <?php if($key<=0) :?>active<?php endif;?>" id="room-<? echo $user->id; ?>-id" data-toggle="pill" href="#room-<?php echo $user->id; ?>" role="tab" aria-controls="v-pills-home" aria-selected="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16"><path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/><path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/></svg> <?php echo $user->display_name; ?></a>
                    <?php }?>
                    </div>
                </div>
                <div class="col-8">
                    <div class="tab-content" id="v-pills-tabContent" style="height:100%; position:relative;">
                        <?php foreach ($users as $key => $user) { ?>
                        <div class="tab-pane fade <?php if($key<=0) :?>show active<?php endif;?> text-dark" id="room-<?php echo $user->id; ?>" role="tabpanel" aria-labelledby="v-pills-home-tab" style="max-height:80vh;overflow:auto;">
                                <div class="msg pb-5">
                                    <div class="text-center text-muted">
                                        <!-- <i class="fas fa-grin-wink fa-2x"></i> -->
                                        <i class="dashicons dashicons-smiley fa-2x"></i>
                                        <p>مرحبا بك اترك رسالتك.</p>
                                    </div>
                                </div>
                                <form method="post" class="form d-flex" style="position:absolute;width:100%;bottom:0px;">
                                    <input type="text" name="msg"  style="flex:1"  autocomplete="false" autofocus>
                                    <input type="hidden" name="room" value="room-<?php echo $user->id; ?>" >
                                    <button type="submit" class="btn btn-secondary" name="sentmsg"><span class="dashicons dashicons-saved"></span></button>
                                    <input type="file" name="imgUpload" class="d-none" collator_sort_with_sort_keys="attchmentUpload" accept="application/pdf, image/*" />
                                    <?php wp_nonce_field( 'imgUpload', 'imgUpload_nonce' ); ?>
                                    <button type="button" class="btn btn-secondary attchmentBtn" name="attchmentBtn" > <span class="dashicons dashicons-admin-links"></span></button>
                                </form>
                            </div>
                            
                        
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
</div>