class TestTestTest {
  async run(options) {
    sharedStorage.set("kkk", "vvv");
    let value = await sharedStorage.get("kkk");
    console.log(value);
    console.log(options.name);
    let names = '';
    for(var name in this) { names += name + ","; }
    console.log(names);
  }
}

registerOperation("test-operation", TestTestTest);
