/**
 * @fileoverview Merges bids 1,2,3 into a single JSON object.
 * Run as, 'node write_bids.js > bids.json'.
 */

const fs = require('fs')

let json = {};
json["base64_encoded_bids"] = [];
for (let i = 1; i <= 3; ++i) {
  sxgData = fs.readFileSync(`bid${i}.sxg`);
  json["base64_encoded_bids"].push(sxgData.toString("base64"));
}
console.log(JSON.stringify(json, null, 2));
