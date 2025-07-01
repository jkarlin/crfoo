function makeContentUrl() {
    let options = document.getElementById('frameUrl').options;
    let fragment = options[options.selectedIndex].value;
    return new URL(fragment, 'https://cr.kungfoo.net/fenced_frame/content/');
}

function createFencedFrame() {
    let frame = document.createElement('fencedframe');
    let config = new FencedFrameConfig(makeContentUrl());
    frame.config = config;
    document.body.appendChild(frame);
}

function createIframe() {
    let frame = document.createElement('iframe');
    frame.src = makeContentUrl();
    document.body.appendChild(frame);
}

function createCredentiallessIframe() {
    let frame = document.createElement('iframe');
    frame.credentialless = true;
    frame.src = makeContentUrl();
    document.body.appendChild(frame);
}