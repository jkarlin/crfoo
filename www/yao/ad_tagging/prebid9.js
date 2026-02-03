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

/**
 * Ad Configuration Configuration
 * * Defines the type, location, and styling of all ad units on the page.
 * To add a new ad, append a new object to this array.
 */
const adInventory = [
    // --- Main Flow Elements ---
    {
        type: 'iframe',
        label: '&lt;iframe&gt; Ad',
        containerSelector: '.first-viewport-container',
        attributes: {
            src: 'https://cr.kungfoo.net/ad_img/300x250.png',
            width: '600',
            height: '200',
            title: 'iframe 1'
        }
    },
    {
        type: 'iframe',
        label: 'Absolute &lt;iframe&gt; Ad',
        containerSelector: '.first-viewport-container',
        attributes: {
            src: 'https://cr.kungfoo.net/ad_img/300x250.png',
            width: '300',
            height: '250',
            title: 'absolute iframe'
        },
        styles: {
            position: 'absolute',
            right: '50px',
            top: '350px',
            border: '2px solid red'
        }
    },
    {
        type: 'img',
        label: '&lt;img&gt; Ad',
        containerSelector: '.first-viewport-container',
        attributes: {
            src: 'https://cr.kungfoo.net/ad_img/300x250.png',
            alt: 'image 1',
            width: '300',
            height: '200'
        }
    },
    {
        type: 'span',
        label: 'background-image &lt;span&gt; Ad',
        containerSelector: '.first-viewport-container',
        attributes: { id: 'span1' },
        styles: {
            display: 'inline-block',
            width: '300px',
            height: '200px',
            backgroundImage: "url('https://cr.kungfoo.net/ad_img/300x250.png')",
            backgroundSize: 'cover',
            border: '1px solid #000'
        }
    },
    {
        type: 'video',
        label: '&lt;video&gt; Ad',
        containerSelector: '.first-viewport-container',
        attributes: {
            src: 'https://cr.kungfoo.net/yao/ad_tagging/sample.mp4',
            width: '300',
            height: '200',
            controls: true,
            autoplay: true,
            loop: true,
            muted: true
        },
        styles: {
            border: '1px solid #000',
            objectFit: 'cover'
        }
    },
    {
        type: 'video',
        label: '&lt;video&gt; Ad (Block)',
        containerSelector: '.first-viewport-container',
        attributes: {
            src: 'https://cr.kungfoo.net/yao/ad_tagging/sample.mp4',
            width: '300',
            height: '200',
            controls: true,
            autoplay: true,
            loop: true,
            muted: true
        },
        styles: {
            border: '1px solid #000',
            objectFit: 'cover',
            display: 'block',
            marginTop: '5px'
        }
    },
    {
        type: 'video',
        label: '&lt;video&gt; Ad (Float Left)',
        containerSelector: '.first-viewport-container',
        wrapperStyles: { width: '100%' },
        attributes: {
            src: 'https://cr.kungfoo.net/yao/ad_tagging/sample.mp4',
            width: '300',
            height: '200',
            controls: true,
            autoplay: true,
            loop: true,
            muted: true
        },
        styles: {
            border: '1px solid #000',
            objectFit: 'cover',
            float: 'left'
        }
    },
    
    // --- Sticky Position Elements ---
    {
        type: 'video',
        label: 'Sticky &lt;video&gt; Ad',
        containerSelector: '.fixed-bottom-right',
        attributes: {
            src: 'https://cr.kungfoo.net/yao/ad_tagging/sample.mp4',
            width: '300',
            height: '200',
            controls: true,
            autoplay: true,
            loop: true,
            muted: true
        },
        styles: {
            border: '1px solid #000',
            objectFit: 'cover',
            display: 'block'
        }
    }
];

/**
 * Main Initialization Function
 */
window.initAdManager = function() {
    adInventory.forEach(adConfig => {
        renderAdUnit(adConfig);
    });
};

/**
 * Renders a single ad unit based on the provided configuration object.
 * @param {Object} config - The ad definition object
 */
function renderAdUnit(config) {
    const container = document.querySelector(config.containerSelector);
    if (!container) {
        console.warn(`Container not found for ${config.label}: ${config.containerSelector}`);
        return;
    }

    // 1. Create Wrapper
    const wrapper = document.createElement('div');
    if (config.wrapperStyles) {
        Object.assign(wrapper.style, config.wrapperStyles);
    }

    // 2. Create and Append Label
    const labelDiv = document.createElement('div');
    labelDiv.className = 'ad-label'; // Maps to CSS class
    labelDiv.innerHTML = config.label;
    wrapper.appendChild(labelDiv);

    // 3. Create Ad Element
    const element = document.createElement(config.type);

    // Apply attributes (src, width, controls, etc.)
    if (config.attributes) {
        Object.entries(config.attributes).forEach(([key, value]) => {
            // Handle video source specifically as a child element or src attribute
            if (config.type === 'video' && key === 'src') {
                const source = document.createElement('source');
                source.src = value;
                source.type = 'video/mp4';
                element.appendChild(source);
            } else if (key === 'src' || key === 'href' || typeof value === 'string') {
                element.setAttribute(key, value);
            } else {
                element[key] = value; // boolean attributes like autoplay/controls
            }
        });
    }

    // Apply inline styles (border, object-fit, float, etc.)
    if (config.styles) {
        Object.assign(element.style, config.styles);
    }

    // 4. Final Injection
    wrapper.appendChild(element);
    container.appendChild(wrapper);
}

