// Mock FP script.
(() => {
  const x = navigator.language;
  const y = history.length;
  const z = navigator.doNotTrack;
  const fp = x + y + z;
  console.log('FP is', fp);
})();
