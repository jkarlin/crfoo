function storeDummyFunctionAndThenMonkeypatch(numIterations) {
  console.time('storeDummyFunctionAndThenMonkeypatch');
  for (let i = 0; i < numIterations; i++) {
    const originalDummyFunction = history.dummyFunction;
    history.dummyFunction = function(...args) {
      return originalDummyFunction.apply(history, args);
    };
  }
  console.timeEnd('storeDummyFunctionAndThenMonkeypatch');
}

function invokeDummyFunction(numIterations) {
  console.time('invokeDummyFunction');
  for (let i = 0; i < numIterations; i++) {
    history.dummyFunction();
  }
  console.timeEnd('invokeDummyFunction');
}
