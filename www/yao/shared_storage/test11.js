class TestOperation {
  async run(data) {
    console.log("====================== data ====================");
    console.log(data);
    console.log("====================== JSON.stringify(data) ====================");
    console.log(JSON.stringify(data));
  }
}

registerOperation("test-operation", TestOperation);
