function insertAdFrameFromAdScript(url) {
  const iframe = document.createElement('iframe');
  iframe.src = url;
  document.body.appendChild(iframe);
}

insertAdFrameFromNonAdScriptAsync('https://cdn.glitch.global/cd35de4f-7fd8-4eaf-87f1-9299f60517fc/social-engineering-ad1.png');
