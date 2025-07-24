function insertAdFrameFromNonAdScript(url) {
  const iframe = document.createElement('iframe');
  iframe.src = url;
  document.body.appendChild(iframe); 
}

function insertAdFrameFromNonAdScriptAsync(url) {
  sharedStorage.set('a', 'b')
    .then(() => {})
    .catch(error => {
      insertAdFrameFromNonAdScript(url);
    });
 
  // setTimeout(() => {
  //   insertAdFrameFromNonAdScript(url);
  // }, "100");
}
