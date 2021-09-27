class TestOperation {
  async run(urls, data) {
    console.log("====== run started =====");
    console.log(urls);
    for (let i = 0; i < 10000000; i++) {
      if (i % 1000000 == 0)
      console.log(i);
    }
    console.log("====== run finished =====");

    return 1;
  }
}

registerURLSelectionOperation("test-operation", TestOperation);
