// Mock FP script.
let fp;
if (URLSearchParams(location.search).get('a') == '0') {
  const x = navigator.language;
  const y = history.length;
  const z = navigator.doNotTrack;
  fp = x + y + z;
} else if (URLSearchParams(location.search).get('a') == '1') {
  const x = navigator.deviceMemory;
  const y = navigator.languages;
  const z = navigator.vendor;
  fp = x + y + z;
}
console.log('FP is', fp);
