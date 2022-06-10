function show_hide_password_1(target) {
    var ph = document.getElementById("pass1");
    var input = document.getElementById('password1');
    if (input.getAttribute('type') == 'password') {
        input.setAttribute('type', 'text');
        ph.src = ph.src.replace("Photos/show.png", "Photos/hide.png");
    } else {
        input.setAttribute('type', 'password');
        ph.src = ph.src.replace("Photos/hide.png", "Photos/show.png");
    }
    return false;
}

function show_hide_password_2(target) {
    var ph = document.getElementById("pass2");
    var input = document.getElementById('password2');
    if (input.getAttribute('type') == 'password') {
        input.setAttribute('type', 'text');
        ph.src = ph.src.replace("Photos/show.png", "Photos/hide.png");
    } else {
        input.setAttribute('type', 'password');
        ph.src = ph.src.replace("Photos/hide.png", "Photos/show.png");
    }
    return false;
}

function Change_bg_Color(color) {
    var element = document.getElementById('block');
    var form_in = document.getElementById("color");
    if (color === 1) {
        element.style.backgroundColor = '#7FFFD4';
        form_in.value = '#7FFFD4';
    } else if (color === 2) {
        element.style.backgroundColor = '#87CEEB';
        form_in.value = '#87CEEB';
    } else if (color === 3) {
        element.style.backgroundColor = '#FF7F50';
        form_in.value = '#FF7F50';
    } else if (color === 4) {
        element.style.backgroundColor = '#FFF493';
        form_in.value = '#FFF493';
    } else if (color === 5) {
        element.style.backgroundColor = '#DDA0DD';
        form_in.value = '#DDA0DD';
    } else {
        element.style.backgroundColor = '#F6F8FA';
        form_in.value = '#F6F8Fa';
    }
}