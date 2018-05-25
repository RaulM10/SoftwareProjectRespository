var Message = {
    PageInformationText : "This is the Contact Us Page"
}

var NotificationBubble = new Notification("- - - - - Welcome - - - - -", {
    body : Message.PageInformationText,
    icon : "http://cdn.shopify.com/s/files/1/0771/0055/products/lewandowski-9-poland-euro-2016-away-jersey_grande.jpg?v=1499433686",
    tag : "NEVERGRIND-CHAT-ALERT"
});

setTimeout(function(){
    NotificationBubble.close();
}, 5000);