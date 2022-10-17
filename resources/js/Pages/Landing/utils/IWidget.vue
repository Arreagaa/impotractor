<!--<script type="text/javascript">
function openForm() {
    document.getElementById("myForm").style.display = "block";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}
</script>
<template>
    <body>
        <button class="open-button" onclick="openForm()">Chat</button>

        <div class="chat-popup" id="myForm">
            <form action="/action_page.php" class="form-container">
                <h1>Chat</h1>

                <label for="msg"><b>Message</b></label>
                <textarea
                    placeholder="Type message.."
                    name="msg"
                    required
                ></textarea>

                <button type="button" class="btn cancel" onclick="closeForm()">
                    Close
                </button>
            </form>
        </div>
    </body>
</template>
<style>

/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
    font-weight: 500;
    font-size: 16px;
    letter-spacing: 1px;
    display: inline-block;
    padding: 8px 32px;
    border-radius: 50px;
    transition: 0.5s;
    margin: 10px;
    color: #fff;
    background: #f1c40f;
    opacity: 0.8;
    position: fixed;
    bottom: 23px;
    right: 28px;
}

/* The popup chat - hidden by default */
.chat-popup {
    display: none;
    position: fixed;
    bottom: 0;
    right: 15px;
    border: 3px solid #f1f1f1;
    z-index: 9;
}

/* Add styles to the form container */
.form-container {
    max-width: 300px;
    padding: 10px;
    background-color: white;
}

/* Full-width textarea */
.form-container textarea {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
    resize: none;
    min-height: 200px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
    background-color: #ddd;
    outline: none;
}


/* Add a red background color to the cancel button */
.form-container .cancel {
    font-weight: 500;
    font-size: 16px;
    letter-spacing: 1px;
    display: inline-block;
    padding: 8px 32px;
    border-radius: 50px;
    transition: 0.5s;
    margin: 10px;
    color: #fff;
    background: #f1c40f;
    opacity: 0.8;
    position: fixed;
    bottom: 23px;
    right: 28px;
}

/* Add some hover effects to buttons */
.form-container .btn:hover,
.open-button:hover {
    opacity: 1;
}
</style>-->

<!--<template>
    <div>
        <a
            href="https://api.whatsapp.com/send/?phone=50231097830&text=Hablar+con+especialista+Caterpillar&type=phone_number&app_absent=0"
            Target="_blank"
        >
            <l-icon
                icon="fa-brands fa-whatsapp"
                class="iconwhp text-yellow-400 bg-transparent"
            />
        </a>
    </div>
</template>
<style>
.iconwhp {
    font-weight: 500;
    font-size: 45px;
    letter-spacing: 1px;
    display: inline-block;
    transition: 0.5s;
    margin: 10px;
    opacity: 0.8;
    position: fixed;
    bottom: 23px;
    right: 28px;
}
</style>-->

<!-- GetButton.io widget -->
<script type="text/javascript">
(function () {
    var options = {
        whatsapp: "+(502) 3109 7830",
        link: "https://api.whatsapp.com/send/?phone=+50245764149&text=Hablar+con+especialista+Case&type=phone_number&app_absent=0",
        link_color: "#A8CE50",
        call_to_action: "Comunícate con los Especialistas",
        button_color: "#f1c40f",
        position: "right",
        order: "whatsapp, link",
        pre_filled_message: "Hablar con especialista Caterpillar",
    };
    var proto = "https:",
        host = "getbutton.io",
        url = proto + "//static." + host;
    var s = document.createElement("script");
    s.type = "text/javascript";
    s.async = true;
    s.src = url + "/widget-send-button/js/init.js";
    s.onload = function () {
        WhWidgetSendButton.init(host, proto, options);
    };
    var x = document.getElementsByTagName("script")[0];
    x.parentNode.insertBefore(s, x);
})();
</script>
