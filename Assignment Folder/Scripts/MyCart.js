var Message = {
    PageInformationText : "This is the My Cart Page"
}

var NotificationBubble = new Notification("- - - - - Welcome - - - - -", {
    body : Message.PageInformationText,
    icon : "https://images-na.ssl-images-amazon.com/images/I/51a9gPiJ2mL._UX385_.jpg",
    tag : "NEVERGRIND-CHAT-ALERT"
});

setTimeout(function(){
    NotificationBubble.close();
}, 5000);