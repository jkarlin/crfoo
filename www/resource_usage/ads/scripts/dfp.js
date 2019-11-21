let frame = document.createElement("iframe");
frame.width = 400;
frame.height = 400;
frame.setAttribute("autoplay", "");
frame.setAttribute("muted", "");
frame.setAttribute("allow", "autoplay");
var urlParams = new URLSearchParams(window.location.search);
var site = urlParams.get('site')
console.log(site);
if (site.substr(site.length - 3) == "mp4") {
  document.body.appendChild(frame);
  doc = frame.contentDocument || frame.contentWindow.document;
  let v = doc.createElement("video");
  v.setAttribute("muted", "");
  v.setAttribute("autoplay", "");
  v.src = site;
  v.width=400;
  v.height=400;
  doc.body.append(v);
  v.play();
} else if (site) {
  frame.src = site;
  document.body.appendChild(frame);
}
else {
  frame.src = "ads/scripts/_ads.html";
  document.body.appendChild(frame);
}
