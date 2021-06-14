class TestTestTest {
  async run(urls, options) {
//     return 1;
    return new Promise(function(resolve) {
        setTimeout(() => resolve(1), 500);
    });
//     if (options.name == "experimentA") {
//       return 1;
//     } else {
//       return 2; 
//     }
  }
}

registerURLSelectionOperation("test-operation", TestTestTest);
