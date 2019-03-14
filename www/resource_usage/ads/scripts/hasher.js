
var seed = "starting seed for hash";
    
function doHash() {
        seed = CryptoJS.MD5(seed);
        console.log(seed);
    setTimeout(doHash, 0);
}
doHash();
