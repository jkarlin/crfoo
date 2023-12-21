class SendReport {
  async run(urls, data) {
    let j = 0;
    for(let i = 0; i < 10000000; i++) {
      j += 1;
    }

    // The user agent will send the report to a default endpoint after a delay.
    privateAggregation.sendHistogramReport({
      bucket: 0,
      value: 128, // A predetermined fixed value; see Private Aggregation API explainer: Scaling values.
    });
  }
}

register('foo', SendReport);
