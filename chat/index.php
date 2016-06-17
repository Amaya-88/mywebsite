<!DOCTYPE html>
<html>
    <head>
        <?php include "metatags.php" ?>
        <link rel="icon" href="/images/site_icon.png" />
        <link rel="stylesheet" type="text/css" href="/styles/stylesheets/layout.css">
        <title>Chat</title>
    </head>
    <body>
        <div id="content">
            <div class="center">
                <div class="main">
                    <h1>Chat</h1>
                    <?php session_start(); ?>
                    <div class="chat-wrapper" data-chat-wrapper>
                        <div class="user-wrapper" data-user-wrapper data-user-name="<?php echo $_SESSION['name']; ?>"></div>
                        <div class="login-wrapper">
                            <form data-chat-login-form class="<?php if(isset($_SESSION['name'])) { echo 'hide'; } ?>">
                                <label>
                                    Name
                                    <input type="text" id="userName" data-user-name />
                                </label>
                                <input class="button" type="submit" value="ok" data-submit-user-name />
                            </form>
                        </div>
                        <div id="chatbox" data-chatbox>
 
                        </div>
                        <form name="message" action="">
                            <input name="usermsg" type="text" id="usermsg" size="63" />
                            <input class="button" name="submitmsg" type="submit" id="submitmsg" value="Send" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/x-jqote-template" id="user-info-tpl">
             <div class="user-info">Wilkommen <%= this.name %></div>
             <button class="button" data-logout-user>Logout</button>
        </script>
        <script type="text/x-jqote-template" id="chat-message-txt">
            <div class='msgln'><%= this.date %> <b><%= this.userName %></b>: <%= this.message %><br></div>        
        </script>
        <script type="text/x-jqote-template" id="chat-message-logout">
            <div class='msgln'><i>User <%= this.userName %> has left the chat session.</i><br></div>
        </script>
        <script type="text/x-jqote-template" id="chat-message-login">
            <div class='msgln'><i>User <%= this.userName %> is coming into the chat room.</i><br></div>
        </script>
        <script type="text/javascript" src="/lib/js/jquery.js"></script>
        <script type="text/javascript" src="/lib/js/jquery.jqote2.min.js"></script>
        <script type="text/javascript" src="/scripts/scripts.js"></script>
        <script type="text/javascript" src="/scripts/modules/chat/chat.js"></script>
        <script type="text/javascript">
            $(document).ready(docLoad.bind(this));
            function docLoad() {
                this.chat = new Chat();

                initHandlers();

                if ($('[data-user-name]').data('user-name').length) {
                    startChatSession($('[data-user-name]').data('user-name'));
                }
            }

            function initHandlers() {
                $('[data-submit-user-name]').on('click', onDataSubmituserNameClick.bind(this));
                $('[data-chat-wrapper]').on('click', '[data-logout-user]', onLogoutUserClick.bind(this));
                $('[data-chat-wrapper]').on('submit', 'form[name=message]', onMsgFormSubmit.bind(this));
            }

            function onDataSubmituserNameClick(e) {
                e.preventDefault();
                var that = this;
                this.chat.doLogin($(e.currentTarget).closest('[data-chat-login-form]').find('[data-user-name]').val())
                    .done(function (userName) {
                        $('[data-chat-login-form]').addClass('hide');
                        startChatSession(userName)
                    });
            }

            function startChatSession(name) {
                this.chatInterval = setInterval(showLog, 2500);
                $('[data-user-wrapper]').html($('#user-info-tpl').jqote({ name: name }));
                showLog();
            }

            function finishChatSession() {
                clearInterval(this.chatInterval);
                location.reload();
            }

            function onLogoutUserClick() {
                this.chat.doLogout()
                    .done(function (response) {
                        console.log(response);
                        finishChatSession();
                    });
            }

            function onMsgFormSubmit(e) {
                var inputMsg = $(e.currentTarget).find('[name=usermsg]');
                e.preventDefault();
                this.chat.submitMessage(inputMsg.val())
                    .done(function (response) {
                        showLog();
                    })
                    .fail(function (jqXHR, textStatus, errorThrown) {
                        console.log('error', arguments);
                    });
                inputMsg.attr("value", "");
                inputMsg.val('');
            }

            function showLog() {
                this.chat.getLog().done(function (log) {
                    var list = '';
                    $.each(JSON.parse(log), function (index, entry) {
                        switch (entry.type) {
                            case 'message':
                                list += $('#chat-message-txt').jqote(entry);
                                break;
                            case 'login':
                                list += $('#chat-message-login').jqote(entry);
                                break;
                            case 'logout':
                                list += $('#chat-message-logout').jqote(entry);
                                break;
                        }
                    });
                    $('[data-chatbox]').html(list);
                    $('[data-chatbox]').animate({
                        scrollTop: $('[data-chatbox]').height()
                    }, 500);
                })
            }
        </script>
    </body>
</html>
