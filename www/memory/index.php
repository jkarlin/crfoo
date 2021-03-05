<?php
header("Cross-Origin-Resource-Policy: cross-origin");
?>


<body>
  This page uses some memory and forces a memory measurement.
  
  <script>
  let y = Array(100000000);
  for (i = 0; i < 100000000; i++) y[i] = i;
  
  async function run() {
    const result = await performance.measureUserAgentSpecificMemory();
    console.log(result);
    
    // Should be named p?
    let e = document.createElement("p");
    e.innerText = "DONE WITH MEASUREMENT";
    document.body.appendChild(e);
  }
  run();
  </script>
</body>
