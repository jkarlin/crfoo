let frame = document.createElement("iframe");
frame.width = 80%;
frame.height = 300;
frame.className = "frame-style";
frame.setAttribute("allow", "autoplay");
var urlParams = new URLSearchParams(window.location.search);
var site = urlParams.get('site')
console.log(site);
if (site.substr(site.length - 3) == "mp4") {
  document.body.appendChild(frame);
  doc = frame.contentDocument || frame.contentWindow.document;
  let v = doc.createElement("video");
    v.setAttribute("controls", "");
  v.setAttribute("muted", "muted");
  v.setAttribute("autoplay", "true");
  v.src = site;
  v.width=400;
  v.height=400;
  doc.body.append(v);
  v.muted=true;
  v.play();
} else if (site) {
  frame.src = site;
  
  document.getElementById("frame-insert").appendChild(frame);
}
else {
  frame.src = "ads/scripts/_ads.html";
  document.getElementById("frame-insert").appendChild(frame);
}
