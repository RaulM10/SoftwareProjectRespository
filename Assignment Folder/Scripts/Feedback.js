var Message = {
    PageInformationText : "This is the Feedback Page"
}

var NotificationBubble = new Notification("- - - - - Welcome - - - - -", {
    body : Message.PageInformationText,
    icon : "https://images-na.ssl-images-amazon.com/images/I/61zlF88iHEL._UX342_.jpg",
    tag : "NEVERGRIND-CHAT-ALERT"
});

setTimeout(function(){
    NotificationBubble.close();
}, 5000);