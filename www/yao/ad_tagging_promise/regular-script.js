function insertAdFrameFromNonAdScriptAsync(url) {
  Promise.resolve().then(() => {
    // const iframe = document.createElement('iframe');
    // iframe.src = url;
    // document.body.appendChild(iframe);

    insertAdFrameFromAdScript(url);
  });
}
