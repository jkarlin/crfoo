debugger;

class TestSetOperation {
  async run(data) {
    console.log("====== TestSetOperation started =====");
    await sharedStorage.set('key0', 'value0');
    console.log("====== TestSetOperation finished =====");
    return 1;
  }
}

class TestGetOperation {
  async run(data) {
    debugger;
    console.log("====== TestGetOperation started =====");
    let v = await sharedStorage.get('key0');
    console.log(v);
    console.log("====== TestGetOperation finished =====");
  }
}

register("test-set-operation", TestSetOperation);
register("test-get-operation", TestGetOperation);
