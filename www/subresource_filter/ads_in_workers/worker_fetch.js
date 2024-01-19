var src="../social-engineering-ad1.png?from_dedicated_worker&/adservices.";

fetch(src).then((response) => {
  response.blob().then((r) => postMessage(r));
},
_ => postMessage(new Blob()));
