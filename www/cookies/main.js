const isThirdPartyContext = window.location.href.includes('thirdparty');

const partitionedCookieEndpoint =
    `partitioned-${isThirdPartyContext ? 3 : 1}p`;

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

document.getElementById('clear-cookies').addEventListener('click', () => {
  const endpoint =
      `/cookies/clear-cookies-${isThirdPartyContext ? 3 : 1}p.php`;
  fetch(endpoint);
});
