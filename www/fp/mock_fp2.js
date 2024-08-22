// Mock FP script.
(() => {
const x = navigator.deviceMemory;
  const y = navigator.languages;
  const z = navigator.vendor;
  const fp = x + y + z;
  document.getElementById('fp2').textContent = 'FP#2 is ' + fp;
})();