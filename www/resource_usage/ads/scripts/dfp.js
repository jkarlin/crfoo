let frame = document.createElement("iframe");
frame.width = 400;
frame.height = 400;
var urlParams = new URLSearchParams(window.location.search);
var site = urlParams.get('site')
console.log(site);
if (site)
  frame.src = site;
else
  frame.src = "ads/scripts/_ads.html";
document.body.appendChild(frame);
