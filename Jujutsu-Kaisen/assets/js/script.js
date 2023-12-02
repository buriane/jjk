function itadoriYuji() {
    document.getElementById("anime-character").style.backgroundImage = "linear-gradient(to bottom,rgb(3, 1, 12, 1), rgba(3, 1, 12, 0.7),rgba(13, 13, 13, 0.2),transparent, rgba(13, 13, 13, 0.2),rgba(13, 13, 13, 1)), url('assets/images/backgrounds/yuji-itadori.png')";
    document.getElementById("character-h1").innerHTML = "Yuji Itadori";
    document.getElementById("character-p").innerHTML = "Yuji is protagonist of the Jujutsu Kaisen series, who was living a normal life until he encountered Megumi and ate one of Sukuna's fingers";
}

function gojoSatoru() {
    document.getElementById("anime-character").style.backgroundImage = "linear-gradient(to bottom,rgb(3, 1, 12, 1), rgba(3, 1, 12, 0.7),rgba(13, 13, 13, 0.2),transparent, rgba(13, 13, 13, 0.2),rgba(13, 13, 13, 1)), url('assets/images/backgrounds/gojo-satoru.png')";
    document.getElementById("character-h1").innerHTML = "Gojo Satoru";
    document.getElementById("character-p").innerHTML = "Gojo is protagonists of the Jujutsu Kaisen series, special grade jujutsu sorcerer and widely recognized as the strongest in the world";
}

function megumiFushiguro() {
    document.getElementById("anime-character").style.backgroundImage = "linear-gradient(to bottom,rgb(3, 1, 12, 1), rgba(3, 1, 12, 0.7),rgba(13, 13, 13, 0.2),transparent, rgba(13, 13, 13, 0.2),rgba(13, 13, 13, 1)), url('assets/images/backgrounds/megumi-fushiguro.png')";
    document.getElementById("character-h1").innerHTML = "Megumi Fushiguro";
    document.getElementById("character-p").innerHTML = "Megumi is deuteragonist of the Jujutsu Kaisen series, an exceptionally focused person and a highly disciplined combatant";
}

function nobaraKugisaki() {
    document.getElementById("anime-character").style.backgroundImage = "linear-gradient(to bottom,rgb(3, 1, 12, 1), rgba(3, 1, 12, 0.7),rgba(13, 13, 13, 0.2),transparent, rgba(13, 13, 13, 0.2),rgba(13, 13, 13, 1)), url('assets/images/backgrounds/suguru-geto.jpeg')";
    document.getElementById("character-h1").innerHTML = "Suguru Geto";
    document.getElementById("character-p").innerHTML = "Geto is an antagonist of the Jujutsu Kaisen series, intellect translates well to battle, always able to think a step ahead of his opponent";
}

function dropdownNav(){
    document.getElementById("myDropdown").classList.toggle("show");
}

function notificationRegister(){
    document.getElementById("register-notification").style.display = "none";
    window.location.assign("register.php");
}

function notificationLogin(){
    document.getElementById("login-notification").style.display = "none";
    window.location.assign("login.php");
}

function userProfiles(){
    document.getElementById("user-profiles").style.display = "inline-block";
    document.getElementById("change-password").style.display = "none";
    document.getElementById("users").classList.add("active");
    document.getElementById("passwords").classList.remove("active");

}

function changePassword(){
    document.getElementById("user-profiles").style.display = "none";
    document.getElementById("change-password").style.display = "inline-block";
    document.getElementById("passwords").classList.add("active");
    document.getElementById("users").classList.remove("active");
}

function insertArticle(){
    document.getElementById("user-profiles").style.display = "none";
    document.getElementById("change-password").style.display = "none";
    document.getElementById("insert-article").style.display = "inline-block";
    document.getElementById("insert-episode").style.display = "none";
}

function insertEpisode(){
    document.getElementById("user-profiles").style.display = "none";
    document.getElementById("change-password").style.display = "none";
    document.getElementById("insert-article").style.display = "none";
    document.getElementById("insert-episode").style.display = "inline-block";
}

function fullScreen(){
    let watch = document.getElementById("watch-content");

    if(watch.style.width === "75%"){
        document.getElementById("watch-content").style.width = "100%";
        document.getElementById("container-title").style.width = "70%";
        document.getElementById("watch-sidebar").style.float = "right";
        document.getElementById("watch-sidebar").style.marginTop = "-59vh";
        document.getElementById("screen-size").innerHTML = "<img src='assets/icon/expand.svg'> Reduce";
    }else if(watch.style.width = "100%"){
        document.getElementById("watch-content").style.width = "75%";
        document.getElementById("container-title").style.width = "100%";
        document.getElementById("watch-sidebar").style.float = "none";
        document.getElementById("watch-sidebar").style.marginTop = "0"
        document.getElementById("screen-size").innerHTML = "<img src='assets/icon/expand.svg'> Expand";
    }
}

function screenBrightness(){
    let nav = document.getElementById("navigation-bar");

    if(nav.style.filter === "brightness(100%)"){
        document.getElementById("navigation-bar").style.filter = "brightness(20%)";
        document.getElementById("container-title").style.filter = "brightness(20%)";
        document.getElementById("watch-sidebar").style.filter = "brightness(20%)";
        document.getElementById("comment-section").style.filter = "brightness(20%)";
        document.getElementById("footer").style.filter = "brightness(20%)";
        document.getElementById("comment").readOnly = "true";
        document.getElementById("screen-brightness").innerHTML = "<img src='assets/icon/light-bulb.svg'> Turn on the light"
    }else if(nav.style.filter = "brightness(20%)"){
        document.getElementById("navigation-bar").style.filter = "brightness(100%)";
        document.getElementById("container-title").style.filter = "brightness(100%)";
        document.getElementById("watch-sidebar").style.filter = "brightness(100%)";
        document.getElementById("comment-section").style.filter = "brightness(100%)";
        document.getElementById("footer").style.filter = "brightness(100%)";
        document.getElementById("comment").readOnly = "false";
        document.getElementById("screen-brightness").innerHTML = "<img src='assets/icon/light-bulb.svg'> Turn off the light";
    }
}

function toggleInput() {
    var status = document.getElementById('status').value;
    var fileInput = document.getElementById('fileInput');
    var linkInput = document.getElementById('linkInput');
    var file = document.getElementById('file');
    var link = document.getElementById('link');

    if (status === 'File') {
        fileInput.style.display = 'block';
        linkInput.style.display = 'none';
        file.required = true;
        link.required = false;
    } else if (status === 'Link') {
        fileInput.style.display = 'none';
        linkInput.style.display = 'block';
        file.required = false;
        link.required = true;
    }
}

window.onclick = function(e) {
    if (!e.target.matches('.dropbtn')) {
        let myDropdown = document.getElementById("myDropdown");
        if (myDropdown.classList.contains('show')) {
            myDropdown.classList.remove('show');
        }
    }
  }
