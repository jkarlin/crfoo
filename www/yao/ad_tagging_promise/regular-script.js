function insertAdFrameFromNonAdScriptAsync(url) {
  Promise.reject().catch( () => {
    const iframe = document.createElement('iframe');
    iframe.src = url;
    document.body.appendChild(iframe);
  }
                         
  // sharedStorage.set('a', 'b')
  //   .then(() => {})
  //   .catch(error => {
  //     const iframe = document.createElement('iframe');
  //     iframe.src = url;
  //     document.body.appendChild(iframe); 
  // });
}
