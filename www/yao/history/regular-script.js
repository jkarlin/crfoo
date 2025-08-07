function pushStateFromRegularScript(url) {
  const stateObj = {};
  const title = "";
  history.pushState(stateObj, title, url);
}

function setLocationFromRegularScript(url) {
  window.location.href = url;
}
