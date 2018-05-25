function OnLoad(){
    Notification.requestPermission();
}

var Message = {
    PageInformationText : "This is the Catalogue Page"
}

var NotificationBubble = new Notification("- - - - - Welcome - - - - -", {
    body : Message.PageInformationText,
    icon : "https://www.soccerpro.com/wp-content/uploads/2018/02/847255_456mes_nike_lionel_messi_barca_home_jsy_01.jpg",
    tag : "NEVERGRIND-CHAT-ALERT"
});

setTimeout(function(){
    NotificationBubble.close();
}, 5000);