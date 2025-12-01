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
  for (let i = 0; i < 50; i++) {
    appendInvisibleIframe(url);
  }
}
