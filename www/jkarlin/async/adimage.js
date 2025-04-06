function doHiddenAdThing(name) {
  val foundInStack = document.adScriptInStack();
  generateStack(name, foundInStack);
}


function hideThisFunction() {
  // Not hiding anything.
  doHiddenAdThing('Default');

  // setTimeout
  setTimeout(_ => { doHiddenAdThing('setTimeout'); }, 1);
  
  // event handler
  let i = document.createElement('img');
  i.onerror = _ => doHiddenAdThing('onerror');
  i.src = "file:///a";

  // postMessage
  window.onmessage = _ => { doHiddenAdThing('postmessage'); };
  window.postMessage("Hi.", "*");

  // eval()
  eval("doHiddenAdThing('eval')");

  // Promise
  new Promise(doHiddenAdThing.bind(null, "Promise"));

  // Promise.resolve
  Promise.resolve('Promise.resolve').then(doHiddenAdThing.bind(null, "Promise.resolve"));

  // Promise.reject
  Promise.reject('Promise.reject').catch(doHiddenAdThing.bind(null, "Promise.reject"));

  // <script>
  generateStackThroughScriptTag('<script>');

  // setTimeout + <script>
  setTimeout(_ => { generateStackThroughScriptTag('setTimeout + <script>'); }, 1);

  // onerror + <script>
  let i2 = document.createElement('img');
  i2.onerror = _ => { generateStackThroughScriptTag('onerror + <script>'); };
  i2.src = "file:///b";

  // <script> + blob
  generateStackThroughBlob('<script src="blob:">');

  // setTimeout + <script> + blob
  setTimeout(_ => { generateStackThroughBlob('setTimeout + <script src="blob:">'); }, 1);

  // onerror + <script> + blob
  let i3 = document.createElement('img');
  i3.onerror = _ => { generateStackThroughBlob('onerror + <script src="blob:">'); };
  i3.src = "file:///b";

  // <script> + data
  generateStackThroughData('<script src="data:">');

  // setTimeout + <script> + data
  setTimeout(_ => { generateStackThroughData('setTimeout + <script src="data:">'); }, 1);

  // onerror + <script> + data
  let i4 = document.createElement('img');
  i4.onerror = _ => { generateStackThroughData('onerror + <script src="data:">'); };
  i4.src = "file:///b";

  // <iframe srcdoc>
  generateStackThroughFrame('<iframe srcdoc>');

  // setTimeout + <iframe srcdoc>
  setTimeout(_ => { generateStackThroughFrame('setTimeout + <iframe srcdoc>'); }, 1);

  // onerror + <script> + data
  let i5 = document.createElement('img');
  i5.onerror = _ => { generateStackThroughFrame('onerror + <iframe srcdoc>'); };
  i5.src = "file:///b";

  if (typeof requestIdleCallback === "function") {
    // requestIdleCallback
    requestIdleCallback(_ => { doHiddenAdThing('requestIdleCallback'); });
    
    // requestIdleCallback + <script>
    requestIdleCallback(_ => { generateStackThroughScriptTag('requestIdleCallback + <script>'); });

    // requestIdleCallback + <script> + blob
    requestIdleCallback(_ => { generateStackThroughBlob('requestIdleCallback + <script src="blob:">'); });

    // requestIdleCallback + <script> + data
    requestIdleCallback(_ => { generateStackThroughData('requestIdleCallback + <script src="data:">'); });

    // requestIdleCallback + <iframe srcdoc>
    requestIdleCallback(_ => { generateStackThroughFrame('requestIdleCallback + <iframe srcdoc>'); });
  }
}

function generateStackThroughScriptTag(name) {
  const s = document.createElement('script');
  s.innerText = `doHiddenAdThing('${name}');`;
  document.body.appendChild(s);
}

function generateStackThroughBlob(name) {
  const b = new Blob([`doHiddenAdThing('${name}');`], {type: 'text/javascript'});
  const s = document.createElement('script');
  s.src = URL.createObjectURL(b);
  s.onload = _ => { URL.revokeObjectURL(s.src); }
  document.body.appendChild(s);
}

function generateStackThroughData(name) {
  const s = document.createElement('script');
  s.src = `data:text/javascript,doHiddenAdThing('${name}');`;
  document.body.appendChild(s);
}

function generateStackThroughFrame(name) {
  const i = document.createElement('iframe');
  i.srcdoc = `<script>top.doHiddenAdThing('${name}');top.document.body.querySelector('iframe').remove();</script>`;
  document.body.appendChild(i);
}

function test() {
  hideThisFunction();
  asyncHideThisFunction();
}

async function asyncHideThisFunction() {
  return new Promise(async (resolve, reject) => {
    // Not hiding anything.
    doHiddenAdThing('async default');

    // setTimeout
    setTimeout(_ => { doHiddenAdThing('async setTimeout'); }, 1);
    
    // <script>
    await generateStackThroughScriptTag('await <script>');

    // await + generateStack()
    await 1;
    doHiddenAdThing('await, then generate');

    resolve();
  });
}
