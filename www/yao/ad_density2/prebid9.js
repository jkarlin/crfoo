const adContainer = document.getElementById('ad-container');
const targetParagraph = document.querySelector('p:nth-of-type(7)');
const frame = document.createElement('iframe');
frame.src = 'ad/image/ad.png';
targetParagraph.insertAdjacentElement('afterend', frame);
