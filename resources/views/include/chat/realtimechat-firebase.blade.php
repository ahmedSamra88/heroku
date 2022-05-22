{{-- <!-- realtime-chat --> --}}
<div class="realtime-chat-icon">
    <div class="icon">
        <small class="badge badge-pill badge-danger d-none" style="position:absolute;right:-5px;">
            <small class="counter">رسالة جديده ..</small>
        </small>
        <i class="fas fa-comment fa-4x"></i>    
    </div>
</div>
<div class="realtime-chat mx-3" data-room="room-">
    <div class="shadow-sm rounded-top">
        <div class="chat-title text-white d-flex justify-content-between align-items-center p-2">
            <button type="button" class="btn-close btn" ></button>

            <div class="user text-uppercase">
                
                    <?php //echo $username; ?>
                <span class="rounded-circle bg-secondary mx-2">
                    <?php //echo substr($username, 0, 1);?>
                </span>
            </div>
        </div>
        <div id="messages" class="chat-msg bg-light rounded-top p-1 pb-5">
             {{-- come from firebase --}}
            <div class="text-center text-muted">
                <i class="fas fa-grin-wink fa-2x mt-4"></i>
                <p>مرحبا بك اترك رسالتك.</p>
            </div>
        </div>
        <form method="post" id="chat-form" class="form d-flex">
            <input type="text" autocomplete="false" autofocus>
            <button type="submit" class="btn btn-secondary" name="sentmsg"><i class="fas fa-paper-plane"></i></button>
        </form>
    </div>
</div>
<script type="module">
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.8.1/firebase-app.js";
    // import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.8.1/firebase-analytics.js";
    import { getDatabase , ref, set , push , onValue , update } from 'https://www.gstatic.com/firebasejs/9.8.1/firebase-database.js';

    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries
  
    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
      apiKey: "AIzaSyDXJetFd3pXSByYi_yoKCJ46nt0HRolGIc",
      authDomain: "chatsi-realtime-laravel-18511.firebaseapp.com",
      databaseURL: "https://chatsi-realtime-laravel-18511-default-rtdb.firebaseio.com",
      projectId: "chatsi-realtime-laravel-18511",
      storageBucket: "chatsi-realtime-laravel-18511.appspot.com",
      messagingSenderId: "347871347339",
      appId: "1:347871347339:web:1a90cba80851e1d272ca8e",
    };
  
    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    // const analytics = getAnalytics(app);
    // Get a reference to the database service
    const database = getDatabase(app);
      // consol.log(database);
      const postListRef = ref(database, "users/room-{{$request->id}}");
      // push message
      function send(message) {
        var message = {
          'id':'{{Auth::id()}}',
          'name':'{{Auth::user()->name}}',
          'message':message
        };
        push(postListRef, message);
        read();
      }
      // get message
      function read() {
        var body = $("#messages").text("");
        onValue(postListRef,(snapshot) => { 
            
            const data = snapshot.val(); 
            
            Object.keys(data).forEach(key => {
                let current_class="current-user";
                let msg_class="";
                let logo="bg-info"
                var name= data[key].name;
                var style="";
                if (data[key].id != '{{Auth::id()}}') {
                    current_class="other";
                    msg_class="text-end justify-content-start";
                    style="flex-direction:row-reverse";
                    logo="bg-primary"
                }
                var msg = `<div style="`+style+`" class="d-flex `+msg_class+`"><div class="`+logo+` shadow text-white" style="margin:2px;padding: 5px;
                                                    border-radius: 50%;
                                                    width: 30px;
                                                    height: 30px;
                                                    background: #fff;
                                                    line-height: 16px;
                                                    text-align: center;
                                                ">`+name.charAt(0)+`</div><div>
                                <div class=`+current_class+`>
                                    `+data[key].message+`
                                </div>
                            </div></div>`;
                body.append(msg);
                body.scrollTop(body[0].scrollHeight);
        
            });
            
        });
        
      }
      // form submit
      $("#chat-form").on("submit",function(e){
        e.preventDefault();
        var message = $(this).find("input");
        send(message.val());
        message.val("");
      });

      $(".realtime-chat-icon").on("click",function(){
            read();
        });
</script>