const partitionedCookieEndpoint =
    `partitioned-${window.location.href.includes('thirdparty') ? 3 : 1}p`;

for (const [id, endpoint] of [
  ['set-cookie', 'samesitenone'],
  ['set-partitioned-cookie', partitionedCookieEndpoint],
]) {
document.getElementById(id).addEventListener(
    'click', () => fetch(`/cookies/${endpoint}.php`));
}

setInterval(() => {
  document.getElementById('document-cookie').textContent = document.cookie;
}, 100);