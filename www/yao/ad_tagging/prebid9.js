(function() {
    // Create the script element
    var script = document.createElement('script');
    script.type = 'text/javascript';
    
    script.src = 'regular-script.js'; 

    // Once the script loads, dispatch an event to the window
    script.onload = function() {
        window.dispatchEvent(new Event('AdScriptLoaded'));
    };

    script.onerror = function() {
        console.error('Failed to load regular-script.js');
    };

    // Inject into the head of the document
    document.head.appendChild(script);
})();
