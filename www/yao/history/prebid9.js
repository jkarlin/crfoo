function pushStateFromAd(url) {
  const stateObj = {};
  const title = "";
  history.pushState(stateObj, title, url);
}

function replaceStateFromAd(url) {
  const stateObj = {};
  const title = "";
  history.replaceState(stateObj, title, url);
}

function forwardFromAd() {
  const stateObj = {};
  const title = "";
  history.forward();
}

function backFromAd() {
  const stateObj = {};
  const title = "";
  history.forward();
}

function setLocationFromAd(url) {
  window.location.href = url;
}
