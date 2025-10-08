function pushStateFromAd(url) {
  const stateObj = {};
  const title = "push";
  history.pushState(stateObj, title, url);
}

function replaceStateFromAd(url) {
  const stateObj = {};
  const title = "replace";
  history.replaceState(stateObj, title, url);
}

function forwardFromAd() {
  history.forward();
}

function backFromAd() {
  history.forward();
}

function locationAssignFromAd(url) {
  window.location.assign(url);
}

function locationReplaceFromAd(url) {
  window.location.replace(url);
}

function overrideAndInvokePushState() {
	const originalPushState = history.pushState;
  
  history.pushState = function(...args) {
    console.log('Intercepted pushState call with arguments:', {
      state: args[0],
      title: args[1],
      url: args[2]
    });

    return originalPushState.apply(history, args);
  };

  history.pushState({}, "", "state1");
}
