class TestOperation {
  async run(urls, data) {
    console.log("====== run started =====");
    console.log(urls);
    for (let i = 0; i < 10000000; i++) {
      if (i % 1000000 == 0) {
        console.log(i);
      }
    }
    console.log("====== run finished =====");

    return 1;
  }
}

class TestOperationFail {
  async run(urls, data) {
    console.log("====== run started =====");
    console.log(urls);
    for (let i = 0; i < 10000000; i++) {
      if (i % 1000000 == 0) {
        console.log(i);
      }
    }
    console.log("====== run finished =====");
  }
}

class TestOperationFast {
  async run(urls, data) {
    console.log("====== run started =====");
    console.log(urls);
    console.log("====== run finished =====");
    return 1;
  }
}

class TestOperationFailFast {
  async run(urls, data) {
    console.log("====== run started =====");
    console.log(urls);
    console.log("====== run finished =====");
  }
}

register("test-operation", TestOperation);
register("test-operation-fail", TestOperationFail);
register("test-operation-fast", TestOperationFast);
register("test-operation-fail-fast", TestOperationFailFast);
