function storeDummyFunctionAndThenMonkeypatch(numIterations) {
  for (let i = 0; i < numIterations; i++) {
    const originalDummyFunction = history.dummyFunction;
    history.dummyFunction = function(...args) {
      return originalDummyFunction.apply(history, args);
    };
  }
}

function invokeDummyFunction(numIterations) {
  for (let i = 0; i < numIterations; i++) {
    history.dummyFunction();
  }
}
