function insertAdFrameFromNonAdScriptAsync(url) {
  Promise.resolve().catch( () => {
    const iframe = document.createElement('iframe');
    iframe.src = url;
    document.body.appendChild(iframe);
  });
}
