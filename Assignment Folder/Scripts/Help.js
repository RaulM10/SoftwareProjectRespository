var Message = {
    PageInformationText : "This is the Help Page"
}

var NotificationBubble = new Notification("- - - - - Welcome - - - - -", {
    body : Message.PageInformationText,
    icon : "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgvL6-Q0gkNfxnB5lVArGmB5b4AM0ERTq6UKc-o7l_6tCm3BKAVQ",
    tag : "NEVERGRIND-CHAT-ALERT"
});

setTimeout(function(){
    NotificationBubble.close();
}, 5000);