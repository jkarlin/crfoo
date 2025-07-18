Promise.resolve().then( () => {
  console.trace();
  image = document.createElement("img");
  image.src = "image.gif";
  document.body.appendChild(image);
});
