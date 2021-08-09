class TestTestTest {
  async run(options) {
    sharedStorage.set("kkk", "vvv");
    let value = await sharedStorage.get("kkk");
    console.log(value);
    console.log(options.name);
    alert("Hello");
  }
}

registerOperation("test-operation", TestTestTest);
