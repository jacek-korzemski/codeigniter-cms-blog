var gradStylesheet = document.createElement('link');
    gradStylesheet.setAttribute('href', 'http://junior-webdev.pl/css/gradients.css');
    gradStylesheet.setAttribute('rel', 'stylesheet');
    document.head.appendChild(gradStylesheet);

if (document.getElementsByClassName('grad-overlay') != undefined) {
    var allOverlays = document.getElementsByClassName('grad-overlay');
    var gradStyles = [];
    for (i = 0; i < allOverlays.length; i++) {
        if (allOverlays[i].getAttribute('data-grad') != undefined) {
            gradStyles[i] = allOverlays[i].getAttribute('data-grad');
        } else {
            gradStyles[i] = 'grad-1';
        }
    }
}
for (i = 0; i < allOverlays.length; i++) {
    allOverlays[i].style.position='relative';
    let gradOverCont = document.createElement('div');
    gradOverCont.setAttribute('style', 'position: absolute; width: 100%; height: 100%; top: 0; left: 0;');
    if (allOverlays[i].getAttribute('data-grad-opacity') == null) {
        gradOverCont.style.opacity='0.5';
    } else if (allOverlays[i].getAttribute('data-grad-opacity') == '') {
        gradOverCont.style.opacity='0.5';
    } else {
        gradOverCont.style.opacity=allOverlays[i].getAttribute('data-grad-opacity');
    }
    gradOverCont.setAttribute('class', 'grad');
    if (gradStyles[i] == '') {
        gradStyles[i] = 'grad-1';
    }
    gradOverCont.classList.add(gradStyles[i]);
    allOverlays[i].insertBefore(gradOverCont, allOverlays[i].firstChild);
}