(function(history) {
  const originalPushState = history.pushState;

  history.pushState = function(...args) {
    console.log('Intercepted pushState call with arguments:', {
      state: args[0],
      title: args[1],
      url: args[2]
    });

    return originalPushState.apply(history, args);
  };

})(window.history);
