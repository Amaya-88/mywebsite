
var Chat = function () {

};


//SERVICES
Chat.prototype.doLogin = function (name) {
    return $.ajax({
        type: "POST",
        url: '/service/chat_service.php',
        data: { functionname: "doChatLogin", name: name },
        dataType: "text"
    });
}

Chat.prototype.doLogout = function () {
    return $.ajax({
        type: "POST",
        url: '/service/chat_service.php',
        data: { functionname: "doChatLogout"},
        dataType: "text"
    });
}

Chat.prototype.submitMessage = function (msg) {
    return $.ajax({
        type: "POST",
        url: '/service/chat_service.php',
        data: { functionname: "submitMessage", message: msg },
        dataType: "json"
    });
}

Chat.prototype.getLog = function () {
    return $.ajax({
        type: "GET",
        url: '/service/chat_service.php',
        data: { functionname: "getLog" },
        cache: false
    });
}