class SendReport {
  async run(urls, data) {
    //let j = 0;
    //for(let i = 0; i < 10000000; i++) {
    //  j += 1;
    //}

    let val = await sharedStorage.get("foo");
    let val2 = await sharedStorage.get("foo");    
    let val3 = await sharedStorage.get("foo");    
    
    // The user agent will send the report to a default endpoint after a delay.
    privateAggregation.contributeToHistogram({
      bucket: BigInt(0),
      value: 128, // A predetermined fixed value; see Private Aggregation API explainer: Scaling values.
    });
    console.log("Sent report");
  }
}

register('foo', SendReport);
