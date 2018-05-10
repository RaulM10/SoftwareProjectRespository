function OnLoad(){
    Notification.requestPermission();
}

var Message = {
    WelcomeText : "Welcome to the Website!",
    PageInformationText : "This is the Catalogue Page"
}

var NotificationBubble = new Notification("- - - - - Welcome - - - - -", {
    body : Message.WelcomeText + "\n- - - - - - - - - - - - - - - - - - -\n" + Message.PageInformationText,
    icon : "http://media.supercheapauto.com.au/sports/images/54506001.jpg",
    tag : "NEVERGRIND-CHAT-ALERT"
});