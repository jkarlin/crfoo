// Mock FP script.
(() => {
  const x = navigator.language;
  const y = history.length;
  const z = navigator.doNotTrack;
  const fp = x + y + z;
  document.getElementById('fp1').textContent = 'FP#1 is ' + fp;
})();
