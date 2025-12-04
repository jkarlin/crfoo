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

function insertVideoAd() {
    const container = document.querySelector('.first-viewport-container');

    if (!container) {
        console.error("Target container '.first-viewport-container' not found.");
        return;
    }

    const wrapper = document.createElement('div');

    wrapper.innerHTML = `
        <div class="label">&lt;video&gt; Ad</div>
        <video controls autoplay loop muted width="300" height="200" style="border: 1px solid #000; object-fit: cover;">
            <source src="https://cr.kungfoo.net/yao/ad_tagging/sample.mp4" type="video/mp4">
        </video>
    `;

    container.appendChild(wrapper);
}
