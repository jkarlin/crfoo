
var seed = "starting seed for hash";
    
function doHash() {
      while (true) {
        seed = CryptoJS.MD5(seed);
        console.log(seed);
      }
}
doHash();
