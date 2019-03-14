var NUM_PARALLEL_HASHERS = 40;
var seed = "starting seed for hash";
function doHash() {
    seed = CryptoJS.MD5(seed);
    console.log(seed);
    setTimeout(doHash, 0);
}

for (var i = 0; i < NUM_PARALLEL_HASHERS; i++)
    doHash();
