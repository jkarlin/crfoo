function appendInvisibleIframe(url) {
    return layer1(url);
}

function layer1(url) {
    console.log('Entering Layer 1');
    return layer2(url);
}

function layer2(url) {
    return layer3(url);
}

function layer3(url) {
    return layer4(url);
}

function layer4(url) {
    return layer5(url);
}

function layer5(url) {
    return layer6(url);
}

function layer6(url) {
    return layer7(url);
}

function layer7(url) {
    console.log('Execution Layer Reached: Creating Iframe');
    const iframe = document.createElement('iframe');
    iframe.src = url;
    iframe.style.position = 'absolute';
    iframe.style.width = '0';
    iframe.style.height = '0';
    iframe.style.border = '0';
    iframe.style.left = '-9999px';
    document.body.appendChild(iframe);
    
    return iframe;
}
