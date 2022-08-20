function start() {

    Push.create("Hello world!", {
    body: "Congratulations! Your request has been approved!'?",
    icon: 'images/adoptmelogo.jpg',
    url:'trial2.php',
    timeout: 4000,
    onClick: function () {
        window.focus();
        this.close();
    }
});
    
}