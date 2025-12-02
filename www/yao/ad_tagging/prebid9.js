function navigateIframe(newUrl) {
  const iframe = document.querySelector('iframe');
  iframe.src = newUrl;
}

function createIframe(newUrl) {
  const iframe = document.createElement('iframe');
  iframe.src = newUrl;
  document.body.appendChild(iframe);
}

function appendInvisibleIframes(url) {
  for (let i = 0; i < 200; i++) {
    appendInvisibleIframe(url);
  }
}

function appendTransparentIframe() {
  var container = document.querySelector('.container');
  if (container) {
    var iframe = document.createElement('iframe');
    iframe.id = 'transparent-frame';
    iframe.src = 'about:blank';
    container.appendChild(iframe);
  }
}
