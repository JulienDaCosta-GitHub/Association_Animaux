// monter/cacher mdp

function show() {
    var p = document.getElementById('mdp');
    p.setAttribute('type', 'text');
}

function hide() {
    var p = document.getElementById('mdp');
    p.setAttribute('type', 'password');
}

var mdpShown = 0;

document.getElementById("eye").addEventListener("click", function () {
    if (mdpShown == 0) {
        mdpShown = 1;
        show();
    } else {
        mdpShown = 0;
        hide();
    }
}, false);