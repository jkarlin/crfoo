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
    const mainContainer = document.querySelector('.first-viewport-container');

    if (mainContainer) {
        function createVideoElement(labelText, videoCustomStyle, wrapperCustomStyle = '') {
            const wrapper = document.createElement('div');
            if (wrapperCustomStyle) wrapper.style.cssText = wrapperCustomStyle;

            wrapper.innerHTML = `
                <div class="label">${labelText}</div>
                <video controls autoplay loop muted width="300" height="200" 
                       style="border: 1px solid #000; object-fit: cover; ${videoCustomStyle}">
                    <source src="https://cr.kungfoo.net/yao/ad_tagging/sample.mp4" type="video/mp4">
                </video>
            `;
            mainContainer.appendChild(wrapper);
        }

        createVideoElement('&lt;video&gt; Ad', '');

        createVideoElement('&lt;video&gt; Ad (Block)', 'display: block; margin-top: 5px;');

        createVideoElement('&lt;video&gt; Ad (Float Left)', 'float: left;', 'width: 100%;');
    } else {
        console.error("Target container '.first-viewport-container' not found.");
    }

    const stickyContainer = document.querySelector('.fixed-bottom-right');

    if (stickyContainer) {
        stickyContainer.innerHTML = '';
        stickyContainer.innerHTML = `
            <div class="label">Sticky &lt;video&gt; Ad</div>
            <video controls autoplay loop muted width="300" height="200" 
                   style="border: 1px solid #000; object-fit: cover; display: block;">
                <source src="https://cr.kungfoo.net/yao/ad_tagging/sample.mp4" type="video/mp4">
            </video>
        `;
    } else {
        console.warn("Target container '.fixed-bottom-right' not found.");
    }
}
