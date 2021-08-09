class TestTestTest {
  async run(options) {
    sharedStorage.set("kkk", "vvv");
    let value = await sharedStorage.get("kkk");
    console.log(value);
    console.log(options.name);
    setTimeout(function(){ alert("Hello"); }, 0);
  }
}

registerOperation("test-operation", TestTestTest);
