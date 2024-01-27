function wait(seconds) {
   var start = new Date().getTime();
   var end = start;
   while(end < start + seconds * 1000) {
     end = new Date().getTime();
   }
}

class TestFastOperation {
  async run(data) {
     console.log("====== TestFastOperation started =====");
     const a = 0;
     const b = a + 1;
     console.log("====== TestFastOperation finished =====");
  }
}

class TestSlowOperation {
  async run(data) {
    console.log("====== TestSlowOperation started =====");
    for (let i = 0; i < 100; i++) {
      await sharedStorage.set(new Date().getTime(), new Date().getTime());
    }
    console.log("====== TestSlowOperation finished =====");
  }
}

class TestVerySlowOperation {
  async run(data) {
    const a = 0;
    const b = a + 1;
    wait(5);
    const c = 0;
    const d = c + 1;
  }
}

class TestSetOperation {
  async run(data) {
    console.log("====== TestSetOperation started =====");
    let a = await sharedStorage.set('key0', 'value0');
    let b = await sharedStorage.append('key0', 'value0');
    console.log("====== TestSetOperation finished =====", a);
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

class TestExceptionOperation {
  async run(data) {
    console.log("====== TestExceptionOperation started =====");
    await sharedStorage.set('key0', 'value0');
    abc;
    console.log("====== TestExceptionOperation finished =====");
    return 1;
  }
}

register("test-set-operation", TestSetOperation);
register("test-get-operation", TestGetOperation);
register("test-exception-operation", TestExceptionOperation);
register("test-fast-operation", TestFastOperation);
register("test-slow-operation", TestSlowOperation);
register("test-very-slow-operation", TestVerySlowOperation);
