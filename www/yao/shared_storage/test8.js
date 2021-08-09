class TestTestTest {
  function globals() { return this; }
  
  async run(options) {
    sharedStorage.set("kkk", "vvv");
    let value = await sharedStorage.get("kkk");
    console.log(value);
    console.log(options.name);
    for(var name in globals()) { names += name + ","; }
    console.log(names);
  }
}

registerOperation("test-operation", TestTestTest);
