class TestOperation {
  async run(options) {
    sharedStorage.set("kkk", "vvv");
    let value = await sharedStorage.get("kkk");
    console.log(value);
    console.log(options.name);
    console.log(Object.getOwnPropertyNames(globalThis));
    return new Promise((resolve,reject) => {
       resolve();
    });
  }
}

class TestExpensiveOperation {
  async run(options) {
    sharedStorage.set("kkk", "vvv");
    let value = await sharedStorage.get("kkk");
    console.log(value);
    console.log(options.name);
    console.log(Object.getOwnPropertyNames(globalThis));
    
    console.log("expensive operation started");
    for (let i = 0; i < 10000000; i++) {
    
    }
    console.log("expensive operation ended");

    return new Promise((resolve,reject) => {
       resolve();
    });
  }
}

registerOperation("test-operation", TestOperation);
registerOperation("test-expensive-operation", TestExpensiveOperation);
