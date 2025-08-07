function pushStateFromAd(url) {
  const stateObj = {};
  const title = "";
  history.pushState(stateObj, title, url);
}

function setLocationFromAd(url) {
  window.location.href = url;
}
