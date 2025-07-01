function makeContentUrl() {
    let options = document.getElementById('frame-url').options;
    let fragment = options[options.selectedIndex].value;
    return new URL(fragment, 'https://cr.kungfoo.net/fenced_frame/content/');
}

function addFrame(frame_element) {
    let container = document.getElementById('frame-container');
    container.appendChild(frame_element);
}

function createFencedFrame() {
    let frame = document.createElement('fencedframe');
    let config = new FencedFrameConfig(makeContentUrl());
    frame.config = config;
    addFrame(frame);
}

function createIframe() {
    let frame = document.createElement('iframe');
    frame.src = makeContentUrl();
    addFrame(frame);
}

function createCredentiallessIframe() {
    let frame = document.createElement('iframe');
    frame.credentialless = true;
    frame.src = makeContentUrl();
    addFrame(frame);
}