class TestTestTest {
  async run(options) {
    sharedStorage.set("kkk", "vvv");
    let value = await sharedStorage.get("kkk");
    console.log(value);
    return sharedStorage.get(options.name);
  }
}

registerOperation("test-operation", TestTestTest);
