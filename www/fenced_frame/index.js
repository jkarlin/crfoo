function createFencedFrame(url) {
    let frame = document.createElement('fencedframe');
    let config = new FencedFrameConfig(url);
    frame.config = config;
    document.body.appendChild(frame);
}

function createIframe(url) {
    let frame = document.createElement('iframe');
    frame.src = url;
    document.body.appendChild(frame);
}

function createCredentiallessIframe(url) {
    let frame = document.createElement('iframe');
    frame.credentialless = true;
    frame.src = url;
    document.body.appendChild(frame);
}