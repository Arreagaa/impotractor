<script setup>
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
</style>
