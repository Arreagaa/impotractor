<script>
export default {
    mounted() {
        (function () {
            var options = {
                whatsapp: "+(502) 3109 7830",
                whatsapp_color: "#666666",
                call: "+(502) 4576 4149",
                call_color: "#666666",
                call_to_action: "Comunícate con los Especialistas",
                button_color: "#f1c40f",
                position: "right",
                order: "whatsapp, call",
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
    },
};
</script>
<template></template>
<style>
.evMtho {
    display: none !important;
}
.cMsFzb {
    visibility: hidden;
}
div .dnIldB::before {
    content: "Especialista Case - ";
}
</style>
