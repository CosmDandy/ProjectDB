function show_hide_password(target) {
    var ph = document.getElementById("pass");
    var input = document.getElementById('password');
    if (input.getAttribute('type') == 'password') {
        input.setAttribute('type', 'text');
        ph.src = ph.src.replace("Photos/show.png", "Photos/hide.png");
    } else {
        input.setAttribute('type', 'password');
        ph.src = ph.src.replace("Photos/hide.png", "Photos/show.png");
    }
    return false;
}