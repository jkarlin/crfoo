// Mock FP script.
(() => {
const x = navigator.deviceMemory;
  const y = navigator.languages;
  const z = navigator.vendor;
  const fp = x + y + z;
  console.log('FP is', fp);
})();