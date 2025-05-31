// sw.js

// On install, activate immediately
self.addEventListener('install', event => {
    console.log('Service Worker: Installing...');
    event.waitUntil(self.skipWaiting()); // Forces the waiting service worker to become the active service worker.
});

// On activation, take control of clients immediately
self.addEventListener('activate', event => {
    console.log('Service Worker: Activating...');
    // Ensures that updates to the service worker take effect immediately for both the current client and all other active clients.
    event.waitUntil(self.clients.claim());
});

// Listen for messages from the client (main page)
self.addEventListener('message', event => {
    console.log('Service Worker: Message received from client:', event.data);

    if (event.data && event.data.type === 'FETCH_DATA') {
        const client = event.source; // event.source is the Client object that sent the message

        if (!client) {
            console.error('Service Worker: Message received, but no source client found.');
            return;
        }

        console.log('Service Worker: Performing fetch request to https://echo.free.beeceptor.com/');
        fetch('https://echo.free.beeceptor.com/')
            .then(response => {
                if (response.ok) {
                    console.log('Service Worker: Fetch successful.');
                    client.postMessage({ type: 'FETCH_RESULT', success: true });
                } else {
                    console.error('Service Worker: Fetch failed with status:', response.status);
                    client.postMessage({ type: 'FETCH_RESULT', success: false, status: response.status });
                }
            })
            .catch(error => {
                console.error('Service Worker: Fetch error:', error);
                client.postMessage({ type: 'FETCH_RESULT', success: false, error: error.message });
            });
    }
});