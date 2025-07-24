function insertAdFrameFromNonAdScriptAsync(url) {
  sharedStorage.set('a', 'b')
    .then(() => {})
    .catch(error => {
      const iframe = document.createElement('iframe');
      iframe.src = url;
      document.body.appendChild(iframe); 
  });
}
