class TestTestTest {
  async run(options) {
    sharedStorage.set("kkk", "vvv");
    let value = await sharedStorage.get("kkk");
    console.log(value);
    console.log(options.name);
    console.log(Object.getOwnPropertyNames(globalThis));
    console.log(SharedArrayBuffer);
    return new Promise((resolve,reject) => {
       resolve();
    });
  }
}

registerOperation("test-operation", TestTestTest);
