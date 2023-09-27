function add(a, b) { 
  return a + b;
}

let sum = 0;

for (let i = 0; i < 10000; ++i) {
  sum += add(i, i+1)
}

class TestSetOperation {
  async run(data) {
    console.log("====== TestSetOperation started =====");
    console.log(sum);
    console.log("====== TestSetOperation finished =====");
  }
}

class TestGetOperation {
  async run(data) {
    console.log("====== TestSetOperation started =====");
    console.log(sum);
    console.log("====== TestSetOperation finished =====");
  }
}

register("test-set-operation", TestSetOperation);
register("test-get-operation", TestGetOperation);
