function appendInvisibleIframe(url) {
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
