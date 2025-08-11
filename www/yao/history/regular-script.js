function pushStateFromRegularScript(url) {
  const stateObj = {};
  const title = "push";
  history.pushState(stateObj, title, url);
}

function replaceStateFromRegularScript(url) {
  const stateObj = {};
  const title = "replace";
  history.replaceState(stateObj, title, url);
}

function forwardFromRegularScript() {
  history.forward();
}

function backFromRegularScript() {
  history.forward();
}

function locationAssignFromRegularScript(url) {
  window.location.assign(url);
}

function locationReplaceFromRegularScript(url) {
  window.location.replace(url);
}
